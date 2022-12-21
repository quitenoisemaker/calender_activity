!(function (l) {
    "use strict";

    // $("#calendar").fullCalendar({
    //     editable: true,
    //     header: {
    //         left: "prev,next today",
    //         center: "title",
    //         right: "month,agendaWeek,agendaDay",
    //     },
    // });
    var e = function () {
        (this.$body = l("body")),
            (this.$modal = l("#event-modal")),
            (this.$event = "#external-events div.external-event"),
            (this.$calendar = l("#calendar")),
            (this.$saveCategoryBtn = l(".save-category")),
            (this.$categoryForm = l("#add-category form")),
            (this.$extEvents = l("#external-events")),
            (this.$calendarObj = null);
    };
    (e.prototype.onDrop = function (e, n) {
        var t = e.data("eventObject"),
            a = e.attr("data-class"),
            o = l.extend({}, t);
        (o.start = n),
            a && (o.className = [a]),
            this.$calendar.fullCalendar("renderEvent", o, !0),
            l("#drop-remove").is(":checked") && e.remove();
    }),
        (e.prototype.onEventClick = function (n, e, t) {
            var a = this,
                o = l("<form></form>");
            o.append("<label>Change event name</label>"),
                o.append(
                    "<div class='input-group'><input class='form-control' type=text value='" +
                        n.title +
                        "' /><span class='input-group-btn'><button type='submit' class='btn btn-success waves-effect waves-light'><i class='fa fa-check'></i> Save</button></span></div>"
                ),
                a.$modal.modal({ backdrop: "static" }),
                a.$modal
                    .find(".delete-event")
                    .show()
                    .end()
                    .find(".save-event")
                    .hide()
                    .end()
                    .find(".modal-body")
                    .empty()
                    .prepend(o)
                    .end()
                    .find(".delete-event")
                    .unbind("click")
                    .click(function () {
                        a.$calendarObj.fullCalendar(
                            "removeEvents",
                            function (e) {
                                return e._id == n._id;
                            }
                        ),
                            a.$modal.modal("hide");
                    }),
                a.$modal.find("form").on("submit", function () {
                    return (
                        (n.title = o.find("input[type=text]").val()),
                        a.$calendarObj.fullCalendar("updateEvent", n),
                        a.$modal.modal("hide"),
                        !1
                    );
                });
        }),
        (e.prototype.enableDrag = function () {
            l(this.$event).each(function () {
                var e = { title: l.trim(l(this).text()) };
                l(this).data("eventObject", e),
                    l(this).draggable({
                        zIndex: 999,
                        revert: !0,
                        revertDuration: 0,
                    });
            });
        }),
        (e.prototype.init = function () {
            this.enableDrag();
            $.ajax({
                url: "/all/activity",
                type: "GET",
                dataType: "json",
                cache: false,
                success: function (res) {
                    console.log(res.data);
                },
            });
            var e = new Date(),
                n =
                    (e.getDate(),
                    e.getMonth(),
                    e.getFullYear(),
                    new Date(l.now())),
                t = [
                    {
                        title: "Hey!",
                        start: new Date(l.now() + 158e6),
                        className: "bg-purple",
                    },
                    {
                        title: "See John Deo",
                        start: n,
                        end: n,
                        className: "bg-success",
                    },
                    {
                        title: "Meet John Deo",
                        start: new Date(l.now() + 168e6),
                        className: "bg-info",
                    },
                    {
                        title: "test",
                        start: new Date(l.now() + 338e6),
                        className: "bg-primary",
                    },
                ],
                a = this;
            (a.$calendarObj = a.$calendar.fullCalendar({
                slotDuration: "00:15:00",
                minTime: "08:00:00",
                maxTime: "19:00:00",
                defaultView: "month",
                handleWindowResize: !0,
                height: l(window).height() - 200,
                header: {
                    left: "prev,next today",
                    center: "title",
                    right: "month,agendaWeek,agendaDay",
                },
                events: t,
                editable: !0,
                droppable: !0,
                eventLimit: !0,
                selectable: !0,
                drop: function (e) {
                    a.onDrop(l(this), e);
                },
                select: function (e, n, t) {
                    a.onSelect(e, n, t);
                },
                eventClick: function (e, n, t) {
                    a.onEventClick(e, n, t);
                },
            })),
                this.$saveCategoryBtn.on("click", function () {
                    var e = a.$categoryForm
                            .find("input[name='category-name']")
                            .val(),
                        n = a.$categoryForm
                            .find("select[name='category-color']")
                            .val();
                    null !== e &&
                        0 != e.length &&
                        (a.$extEvents.append(
                            '<div class="external-event bg-' +
                                n +
                                '" data-class="bg-' +
                                n +
                                '" style="position: relative;"><i class="mdi mdi-checkbox-blank-circle m-r-10 vertical-middle"></i>' +
                                e +
                                "</div>"
                        ),
                        a.enableDrag());
                });
        }),
        (l.CalendarApp = new e()),
        (l.CalendarApp.Constructor = e);
})(window.jQuery),
    (function (e) {
        "use strict";
        window.jQuery.CalendarApp.init();
    })();
