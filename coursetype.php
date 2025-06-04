<?php
// session_start();
require_once 'config/config.php';
require_once 'config/helper.php';
// $a_idchk = $_SESSION['a_id'];
ob_start("ob_html_compress");
include_once 'header.php';

?>

<head>
<!-- jQuery (required) -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!-- Select2 CSS & JS -->
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

<style>
table, td {
  border: 1px solid black;
}
</style>
</head>
<body>

<div id="page-wrapper">
    <?php include_once 'msg.php'; ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Course Type </h1>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <?php
                if (empty($_REQUEST['id'])) {
                    $id = '';
                } else {
                    $id = $_REQUEST['id'];
                }
                $results = $db->query("SELECT * FROM `coursetype` WHERE id='$id'");
				if (!empty($results) && $results->num_rows > 0) {
					$row1 = $results->fetch_assoc();
				}
                ?>

               
                <form name="frm" id="frm" action="pages/action_coursetype.php" enctype="multipart/form-data" method="post">
                    <div class="row">
                       
                        <div class="form-group col-md-6">
                            <label>Name</label>
                            <input type="text" class="form-control input-sm" name="name" value="<?php echo !empty($row1['name']) ? $row1['name'] : ''; ?>">
                        </div>
                                    
                    </div>
                    <div class="form-group">
                        
                        <?php if(!empty($_GET['id'])){ ?>
                             <input type="hidden" name="id" value="<?php echo $row1['id'] ?>">
                            <input type="submit" name="update" value="Update" class="btn btn-success">
                        <?php } else { ?>
                            <input type="submit" name="submit" value="Submit" class="btn btn-success">
                        <?php } ?>
                    </div>
                </form>
            </div>           
        </div>

        <div class="col-md-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table width="100%" class="table table-striped table-bordered table-hover table-condensed" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th class="no-sort">Sl.</th>
                                        <th class="no-sort">Action</th>
                                        <th>Course_Name</th>
                                        <!-- <th>Course Fees</th> -->
										<!-- <th>Duration</th> -->
										<!-- <th>Documentation</th> -->
                                        <th>Status</th>
                                        <!-- <th>Email</th>
                                        <th>Address</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sl = 0;
                                    $data = $db->query("SELECT * FROM `coursetype` ORDER BY id DESC");
									if (!empty($data) && $data->num_rows > 0) {
										while ($value = $data->fetch_object()) {
											$sl++;
											?>
											<tr>
												<td><?php echo $sl; ?></td>
												<td>
													<a href="coursetype.php?id=<?= $value->id; ?>" class="btn btn-success btn-xs">
														<i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;EDIT
													</a>
                                                    <br><br>
                                                    <a href="pages/action_coursetype.php?id=<?php echo $value->id; ?>&submit=Delete" onClick="return confirm('Are You Sure want to Delete??')" class="btn btn-danger btn-xs" title="Click to Delete">&nbsp;<i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete</a>													
												</td>
                                                 <td><?php echo !empty($value->name)?$value->name:''; ?></td>
												
                                                <td>
                                                    <?php if ($value->status == '1') { ?> Active &nbsp;
                                                        <a href="pages/action_coursetype.php?id=<?php echo $value->id; ?>&submit=Disable"
                                                            onClick="return confirm('Are You Sure want to Disable??')"
                                                            class="btn btn-warning btn-xs" title="click to Disable"> <span
                                                                class="glyphicon glyphicon-refresh"></span></a>
                                                    <?php } else { ?> Disable
                                                        <a href="pages/action_coursetype.php?id=<?php echo $value->id; ?>&submit=Enable"
                                                            onClick="return confirm('Are You Sure want to Enable??')"
                                                            class="btn btn-primary btn-xs" title="click to Enable"> <span
                                                                class="glyphicon glyphicon-refresh"></span></a>
                                                    <?php } ?>
                                                </td>
											</tr>
											<?php
										}
									} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<!-- /#page-wrapper -->

</body>

<?php include_once 'footer.php'; ?>