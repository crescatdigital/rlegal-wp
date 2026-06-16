/* ==========================================================================
 * RI Legal — Free Consultation booking calendar
 *
 * Enhances a Contact Form 7 form that contains:
 *
 *   <div class="ri-booking" data-ri-booking
 *        data-max-advance="4" data-work-start="9" data-work-end="17"
 *        data-slot-mins="30" data-lead-hours="2">
 *     <div data-ri-calendar></div>
 *     <div data-ri-slots></div>
 *     [text* consultation-date readonly]
 *     [text* consultation-time readonly]
 *   </div>
 *
 * Rules (all configurable via the data-* attributes above):
 *   - Bookable only up to `max-advance` calendar days ahead.
 *   - Weekdays only (Mon–Fri).
 *   - Times within working hours [work-start, work-end), in `slot-mins` steps.
 *   - A `lead-hours` buffer means same-day slots inside that window are hidden.
 *
 * No external dependencies. Styles are injected once, scoped to .ri-booking,
 * so the widget renders correctly regardless of the theme's compiled CSS.
 * ========================================================================== */
(function () {
    "use strict";

    var MONTHS = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"];
    var DAYS = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var DOW_MON_FIRST = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];

    function pad(n) { return (n < 10 ? "0" : "") + n; }
    function startOfDay(d) { return new Date(d.getFullYear(), d.getMonth(), d.getDate()); }
    function addDays(d, n) { var x = new Date(d); x.setDate(x.getDate() + n); return x; }
    function monthIndex(d) { return d.getFullYear() * 12 + d.getMonth(); }
    function isWeekend(d) { var g = d.getDay(); return g === 0 || g === 6; }
    function sameDay(a, b) {
        return a.getFullYear() === b.getFullYear() &&
            a.getMonth() === b.getMonth() &&
            a.getDate() === b.getDate();
    }
    /* Monday = 0 … Sunday = 6 */
    function dowMonFirst(d) { return (d.getDay() + 6) % 7; }

    function injectStyles() {
        if (document.getElementById("ri-booking-styles")) return;
        var css =
            ".ri-booking{background:rgba(255,255,255,.12);border-radius:16px;padding:14px;margin:4px 0}" +
            ".ri-booking__title{display:block;color:#fff;font-size:14px;font-weight:600;margin-bottom:10px}" +
            ".ri-cal{background:#fff;border-radius:12px;padding:12px}" +
            ".ri-cal__header{display:flex;align-items:center;justify-content:space-between;margin-bottom:8px}" +
            ".ri-cal__title{font-size:15px;font-weight:600;color:#333}" +
            ".ri-cal__nav{width:32px;height:32px;border:none;background:#F1E7EF;color:#6D3B69;border-radius:8px;font-size:18px;line-height:1;cursor:pointer}" +
            ".ri-cal__nav:disabled{opacity:.35;cursor:not-allowed}" +
            ".ri-cal__dow{display:grid;grid-template-columns:repeat(7,1fr);gap:4px;margin-bottom:4px}" +
            ".ri-cal__dow span{text-align:center;font-size:11px;color:#999;font-weight:600}" +
            ".ri-cal__grid{display:grid;grid-template-columns:repeat(7,1fr);gap:4px}" +
            ".ri-cal__day{width:100%;aspect-ratio:1/1;border:none;border-radius:8px;background:#F7F2F6;color:#333;font-size:14px;cursor:pointer;transition:background .15s,color .15s}" +
            ".ri-cal__day:hover:not(:disabled){background:#884A83;color:#fff}" +
            ".ri-cal__day:disabled{background:transparent;color:#d2d2d2;cursor:not-allowed}" +
            ".ri-cal__day.is-empty{background:transparent;cursor:default}" +
            ".ri-cal__day.is-selected{background:#6D3B69;color:#fff;font-weight:700}" +
            ".ri-slots{margin-top:12px}" +
            ".ri-slots__hint{color:#fff;font-size:13px;opacity:.92;margin:2px 2px 0}" +
            ".ri-slots__grid{display:grid;grid-template-columns:repeat(4,1fr);gap:8px}" +
            ".ri-slot{border:none;border-radius:8px;background:#fff;color:#6D3B69;font-size:14px;font-weight:600;padding:9px 0;cursor:pointer;transition:background .15s,color .15s}" +
            ".ri-slot:hover{background:#4A884F;color:#fff}" +
            ".ri-slot.is-selected{background:#4A884F;color:#fff}" +
            ".ri-booking__fields{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-top:14px}" +
            ".ri-booking__fl{display:flex;flex-direction:column;gap:4px;color:#fff;font-size:12px;font-weight:600}" +
            ".ri-booking__field,.ri-booking input[readonly]{width:100%;background:#fff;color:#333;border:2px solid transparent;border-radius:8px;padding:10px 12px;font-size:13px}" +
            ".ri-booking .wpcf7-form-control-wrap{display:block;width:100%}" +
            ".ri-fieldnote{margin:6px 2px 0;font-size:12px;line-height:1.4;color:rgba(255,255,255,.92)}" +
            "@media(max-width:480px){.ri-booking__fields{grid-template-columns:1fr}.ri-slots__grid{grid-template-columns:repeat(3,1fr)}}";
        var el = document.createElement("style");
        el.id = "ri-booking-styles";
        el.textContent = css;
        document.head.appendChild(el);
    }

    function init(root) {
        if (root.__riBookingInit) return;
        root.__riBookingInit = true;

        var cfg = {
            maxAdvance: parseInt(root.getAttribute("data-max-advance") || "4", 10),
            workStart: parseInt(root.getAttribute("data-work-start") || "9", 10),
            workEnd: parseInt(root.getAttribute("data-work-end") || "17", 10),
            slotMins: parseInt(root.getAttribute("data-slot-mins") || "30", 10),
            leadHours: parseFloat(root.getAttribute("data-lead-hours") || "2")
        };

        var calEl = root.querySelector("[data-ri-calendar]");
        var slotEl = root.querySelector("[data-ri-slots]");
        var dateInput = root.querySelector('input[name="consultation-date"]');
        var timeInput = root.querySelector('input[name="consultation-time"]');
        if (!calEl || !slotEl || !dateInput || !timeInput) return;

        var now = new Date();
        var today = startOfDay(now);
        var maxDate = addDays(today, cfg.maxAdvance);
        var viewYear = today.getFullYear();
        var viewMonth = today.getMonth();
        var selectedDate = null;

        function availableSlots(d) {
            var slots = [];
            if (isWeekend(d) || d < today || d > maxDate) return slots;
            var lastStart = cfg.workEnd * 60 - cfg.slotMins;       // last slot must finish by close
            var nowCutoff = now.getHours() * 60 + now.getMinutes() + cfg.leadHours * 60;
            for (var m = cfg.workStart * 60; m <= lastStart; m += cfg.slotMins) {
                if (sameDay(d, today) && m < nowCutoff) continue;  // same-day lead-time buffer
                slots.push(pad(Math.floor(m / 60)) + ":" + pad(m % 60));
            }
            return slots;
        }

        function dayIsBookable(d) { return availableSlots(d).length > 0; }

        function setField(input, value) {
            input.value = value;
            input.dispatchEvent(new Event("change", { bubbles: true }));
        }

        function renderSlots() {
            slotEl.innerHTML = "";
            if (!selectedDate) {
                var hint = document.createElement("p");
                hint.className = "ri-slots__hint";
                hint.textContent = "Select a day to see available times.";
                slotEl.appendChild(hint);
                return;
            }
            var slots = availableSlots(selectedDate);
            var grid = document.createElement("div");
            grid.className = "ri-slots__grid";
            slots.forEach(function (label) {
                var b = document.createElement("button");
                b.type = "button";
                b.className = "ri-slot";
                b.textContent = label;
                if (timeInput.value === label) b.classList.add("is-selected");
                b.addEventListener("click", function () {
                    setField(timeInput, label);
                    grid.querySelectorAll(".ri-slot").forEach(function (s) { s.classList.remove("is-selected"); });
                    b.classList.add("is-selected");
                });
                grid.appendChild(b);
            });
            slotEl.appendChild(grid);
        }

        function selectDate(d) {
            selectedDate = d;
            setField(dateInput, DAYS[d.getDay()] + ", " + d.getDate() + " " + MONTHS[d.getMonth()] + " " + d.getFullYear());
            setField(timeInput, "");                                // reset time when day changes
            renderCalendar();
            renderSlots();
        }

        function renderCalendar() {
            calEl.innerHTML = "";
            calEl.className = "ri-cal";

            /* Header + month navigation */
            var header = document.createElement("div");
            header.className = "ri-cal__header";

            var prev = document.createElement("button");
            prev.type = "button"; prev.className = "ri-cal__nav"; prev.innerHTML = "&#8249;";
            prev.disabled = monthIndex(new Date(viewYear, viewMonth, 1)) <= monthIndex(today);
            prev.addEventListener("click", function () {
                if (--viewMonth < 0) { viewMonth = 11; viewYear--; }
                renderCalendar();
            });

            var title = document.createElement("span");
            title.className = "ri-cal__title";
            title.textContent = MONTHS[viewMonth] + " " + viewYear;

            var next = document.createElement("button");
            next.type = "button"; next.className = "ri-cal__nav"; next.innerHTML = "&#8250;";
            next.disabled = monthIndex(new Date(viewYear, viewMonth, 1)) >= monthIndex(maxDate);
            next.addEventListener("click", function () {
                if (++viewMonth > 11) { viewMonth = 0; viewYear++; }
                renderCalendar();
            });

            header.appendChild(prev);
            header.appendChild(title);
            header.appendChild(next);
            calEl.appendChild(header);

            /* Weekday labels */
            var dow = document.createElement("div");
            dow.className = "ri-cal__dow";
            DOW_MON_FIRST.forEach(function (d) {
                var s = document.createElement("span"); s.textContent = d; dow.appendChild(s);
            });
            calEl.appendChild(dow);

            /* Day grid */
            var grid = document.createElement("div");
            grid.className = "ri-cal__grid";

            var first = new Date(viewYear, viewMonth, 1);
            var lead = dowMonFirst(first);
            var daysInMonth = new Date(viewYear, viewMonth + 1, 0).getDate();

            for (var i = 0; i < lead; i++) {
                var blank = document.createElement("span");
                blank.className = "ri-cal__day is-empty";
                grid.appendChild(blank);
            }
            for (var day = 1; day <= daysInMonth; day++) {
                var cellDate = new Date(viewYear, viewMonth, day);
                var btn = document.createElement("button");
                btn.type = "button";
                btn.className = "ri-cal__day";
                btn.textContent = String(day);

                if (dayIsBookable(cellDate)) {
                    if (selectedDate && sameDay(cellDate, selectedDate)) btn.classList.add("is-selected");
                    (function (d) {
                        btn.addEventListener("click", function () { selectDate(d); });
                    })(cellDate);
                } else {
                    btn.disabled = true;
                }
                grid.appendChild(btn);
            }
            calEl.appendChild(grid);
        }

        function reset() {
            selectedDate = null;
            viewYear = today.getFullYear();
            viewMonth = today.getMonth();
            setField(dateInput, "");
            setField(timeInput, "");
            renderCalendar();
            renderSlots();
        }

        injectStyles();
        renderCalendar();
        renderSlots();

        /* Clear the picker after a successful CF7 submission */
        document.addEventListener("wpcf7mailsent", function (e) {
            if (root.closest("form") === e.target || (e.target && e.target.contains(root))) reset();
        });
    }

    function boot() {
        var nodes = document.querySelectorAll("[data-ri-booking]");
        for (var i = 0; i < nodes.length; i++) init(nodes[i]);
    }

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", boot);
    } else {
        boot();
    }
})();
