<?php
$title = 'Orders Management';
include_once('header.php');
?>
    <section class="content">
        <div class="page-heading">
            <h1><?PHP echo $title;?></h1>
            <ol class="breadcrumb">
                <li><a href="../index.php">Home</a></li>
                <li class="active"><?PHP echo $title;?></li>
            </ol>
        </div>
        <div class="page-body clearfix">
            <div class="panel panel-default" data-panel-close="false" id="mainPanel">
                <div class="panel-heading">
                   Approve Orders
                </div>
                <div class="panel-body">
                    <div class="col-sm-12">
                        <table id="approvedOrdersTable" class="table table-striped table-hover dataTable" width="100%" hidden >
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>User's Name</th>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>District</th>
                                <th>City</th>
                                <th>Images</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
<div class="modal fade" id="reasonModal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Reason</h4>
            </div>
            <div class="modal-body">
                <textarea class="form-control no-resize" cols="8" rows="5" id="rejectReason" placeholder="Enter Reason...."></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" id="rejectReasonSubmit" class="btn btn-link" data-dismiss="modal" >Save</button>
            </div>
        </div>
    </div>
</div>
<?php
include_once('footer.php');
?>
<!-- Custom js -->
<script src="../js/orders-management.js" type="module"></script>
