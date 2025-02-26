import $ from "jquery";
import "../../vendor/datatable";
import {
    AjaxAction,
    confirmation,
    HandleFormSubmit,
    initDatepicker,
    reloadDatatable,
    showToast,
} from "../../lib/utils";

$(".main-content").on("click", "[data-action]", function (e) {
    if (this.dataset.method == "delete") {
        confirmation((res) => {
            new AjaxAction(this)
                .onSuccess((res) => {
                    showToast(res.status, res.message);
                    reloadDatatable("cuti-table");
                }, false)
                .execute();
        });
        return;
    }

    new AjaxAction(this)
        .onSuccess(function (res) {
            const startDate = $("[data-hmin").data("hmin");
            initDatepicker(".date", {
                startDate,
            });

            const handle = new HandleFormSubmit()
                .onSuccess((res) => {})
                .reloadDatatable("cuti-table")
                .init();
        })
        .execute();
});
