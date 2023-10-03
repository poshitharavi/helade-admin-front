import {fetchPost} from './request.js';
import {
    loading,
    stopLoading,
    notification,
} from "./util.js";

let approvedOrdersTable;
window.onload = function () {

    $('#orderManagementNav').addClass('active');

    getUnApprovedOrders()

    //table button click
    $('#approvedOrdersTable tbody').on('click', 'button', function () {
        let data = approvedOrdersTable.row($(this).parents('tr')).data();
        if (this.id == 'btnOrderCancel') {
            $("#reasonModal").modal("show");
            $("#rejectReasonSubmit").click(function () {

                $('#reasonModal').modal({
                    show: 'false'
                });
                const reason = document.getElementById("rejectReason").value;
                updateStatusOfOrder(data[0],reason,false,$(this).parents('tr'))
            });

        } else if (this.id == 'btnOrderAccept') {
            updateStatusOfOrder(data[0], null, true, $(this).parents('tr'))
        }
    });

};

const updateStatusOfOrder = async (id, reson, status, tableRow) => {
    const load = loading("#mainPanel");
    //array init
    const data = {
        status: status,
        userId: id
    };
    let result = await fetchPost('../services/update-order-status.php', data);
    stopLoading(load);//stop loading
    if (result.status === 0) {
        if (result.data.status === 1) {
            approvedOrdersTable.row(tableRow).remove().draw();
        } else {
            notification('error', 'ERROR', result.data.message);
        }
    } else {
        notification('error', 'ERROR', 'Something went wrong, Please refresh and try again');
        console.error(result.data);
    }
}

const getUnApprovedOrders = async () => {
    const load = loading("#mainPanel");
    $("#approvedOrdersTable").show();
    let result = await fetchPost('../services/get-unApproved-orders.php');
    stopLoading(load);//stop loading
    if (result.status === 0) {
        if (result.data.status === 1) {
            const orderData = result.data.data;
            if (approvedOrdersTable) {//destroy the current table
                approvedOrdersTable.destroy();
            }

            approvedOrdersTable = $('#approvedOrdersTable').DataTable({
                data: orderData,
                responsive: true,
                columnDefs: [{
                    width: "10rem",
                    targets: -1,
                    defaultContent: `<div class="btn-toolbar">
                            <button type="button" class="btn btn-circle btn-outline btn-danger" id="btnOrderCancel"><i class="fa fa-close"></i></button>
                           <button type="button" class="btn btn-circle btn-outline btn-warning" id="btnOrderAccept"><i class="fa fa-check"></i></button>
                        </div>`
                },
                    {responsivePriority: 1, targets: 0},
                    {responsivePriority: 2, targets: 9},
                ],
                aaSorting: []

            });

            new $.fn.dataTable.FixedHeader(approvedOrdersTable);

        } else if (result.data.status === 2) {
            notification('error', 'ERROR', result.data.message);
        }
    } else {
        notification('error', 'ERROR', 'Something went wrong, Please refresh and try again');
        console.error(result.data);
    }
}