<?php
// session_start();
require_once 'config/config.php';
require_once 'config/helper.php';
// $a_idchk = $_SESSION['a_id'];
ob_start("ob_html_compress");
include_once 'header.php';
?>
<div id="page-wrapper">
    <?php include_once 'msg.php'; ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Vehicle Model</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 ">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <?php
                if (empty($_REQUEST['id'])) {
                    $id = '';
                } else {
                    $id = $_REQUEST['id'];
                }
                $results = $db->query("SELECT * FROM `vehicle1` WHERE id='$id'");
                if (!empty($results) && $results->num_rows > 0) {
                    $row = $results->fetch_object();
                } ?>

                <?php
                if (!empty($_POST['status'])) {
                    $in_id = $_POST['in_id'];
                    $status = $_POST['status'];

                    $db->query("UPDATE `vehicle1` SET status='$status' WHERE id='$in_id'");
                    header("Location: vehicle.php");
                }
                ?>

                <form name="frm" id="frm" action="pages/vehicle_action.php" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Vehicle Model Name:<span style="color:red;">*</span></label>
                            <input type="text" class="form-control input-sm" name="name"
                                value="<?php echo !empty($row->name) ? $row->name : ''; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Vehicle No: <span style="color:red;">*</span></label>
                            <input type="text" class="form-control input-sm" name="vehno"
                                value="<?php echo !empty($row->vehno) ? $row->vehno : ''; ?>" required>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="submit" class="btn btn-success">
                            <?php
                            if (!empty($_REQUEST['id'])) {
                                ?>
                                <input type="hidden" name="submit" value="update" />
                                <input type="hidden" name="id" value="<?php echo $row->id; ?>" />
                                <?php
                            } else {
                                ?>
                                <input type="hidden" name="submit" value="add" />
                                <?php
                            }
                            ?>
                        </div>
                </form>
            </div>

            <div class="col-md-12 col-xs-12" id="view">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table width="100%" class="table table-striped table-bordered table-hover table-condensed"
                                id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th class="no-sort">Sl.</th>
                                        <th class="no-sort">Action</th>
                                        <th>Vehicle Name</th>
                                        <th>Vehicle Model NO</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sl = 0;
                                    $data = $db->query("SELECT * FROM `vehicle1` ORDER BY id DESC");
                                    if (!empty($data) && $data->num_rows > 0) {
                                        while ($value = $data->fetch_object()) {
                                            $sl++;
                                            ?>
                                            <tr>
                                                <td><?php echo $sl; ?></td>
                                                <td>
                                                    <a href="vehicle.php?id=<?= $value->id; ?>" class="btn btn-success btn-xs">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;EDIT
                                                    </a>
                                                    <br><br>
                                                    <a href="pages/vehicle_action.php?id=<?php echo $value->id; ?>&submit=Delete"
                                                        onClick="return confirm('Are You Sure want to Delete??')"
                                                        class="btn btn-danger btn-xs" title="Click to Delete">&nbsp;<i
                                                            class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete</a>
                                                </td>
                                                <td><?php echo !empty($value->name) ? $value->name : ''; ?></td>
                                                <td><?php echo !empty($value->vehno) ? $value->vehno : ''; ?></td>
                                                <td>
                                                    <?php if ($value->status == '1') { ?> Active &nbsp;
                                                        <a href="pages/vehicle_action.php?id=<?php echo $value->id; ?>&submit=Disable"
                                                            onClick="return confirm('Are You Sure want to Disable??')"
                                                            class="btn btn-warning btn-xs" title="click to Disable"> <span
                                                                class="glyphicon glyphicon-refresh"></span></a>
                                                    <?php } else { ?> Disable
                                                        <a href="pages/vehicle_action.php?id=<?php echo $value->id; ?>&submit=Enable"
                                                            onClick="return confirm('Are You Sure want to Enable??')"
                                                            class="btn btn-primary btn-xs" title="click to Enable"> <span
                                                                class="glyphicon glyphicon-refresh"></span></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<head>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

    <script>
        function validateMobile(input) {
            // Remove any non-digit characters
            input.value = input.value.replace(/\D/g, '');

            // Limit to 10 digits
            if (input.value.length > 10) {
                input.value = input.value.slice(0, 10);
            }
        }
    </script>

    <script type="text/javascript">
        window.onload = () => {
            CKEDITOR.replace("editor1");
        };

        function sendText() {
            window.parent.postMessage(CKEDITOR.instances.CK1.getData(), "*");
        }
    </script>

    <script>
        document.getElementById('cv').addEventListener('change', function () {
            const fileInput = this;
            const file = fileInput.files[0];
            const errorSpan = document.getElementById('fileError');

            if (file) {
                const fileName = file.name;
                const fileExtension = fileName.split('.').pop().toLowerCase();
                const fileType = file.type;

                if (fileExtension !== 'pdf' || fileType !== 'application/pdf') {
                    errorSpan.textContent = 'Only PDF files are allowed.';
                    fileInput.value = ''; // clear the input
                } else {
                    errorSpan.textContent = '';
                }
            }
        });
    </script>

</head>
<?php include_once 'footer.php'; ?>