<?php

/* data session */
$user_id = $s_all['user_id'];
$user_name = $s_all['user_name'];
$user_fullname = $s_all['user_fullname'];
$user_email = $s_all['user_email'];
$instansi = $s_all['instansi'];
$user_last_login = $s_all['user_last_login'];
$user_last_activity = $s_all['user_last_activity'];
$user_date_created = $s_all['user_date_created'];
$user_role = $s_all['user_role'];
$user_role_name = $this->vf->getFieldById('role_name', 'roles', 'id', $s_all['user_role']);

?>

<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Main Activities
      <small>Study Visit</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Project</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box box-default">
      <div class="box-header with-border">
        <small>Please Specify at least <?php echo $project['ab_jumlah_study_visit']; ?> study visit</small>
      </div>

        <input type="hidden" value="<?php echo $project['id'];?>" name="id">

        <div class="box-body">


          <div class="box-body no-padding">
            <table class="table table-striped">
              <tr>
                <th>Add Study Visit
                  <?php if (count($study_visit)<$project['ab_jumlah_study_visit']) { ?> 
                  <button class="btn btn-box-tool" href="#" onclick="add_study_visit('<?php echo $project['id'];?>')" title="Tambah Study Visit"><i class="fa fa-plus"></i></button>
                  <?php } ?>
                </th>
                <th>Title</th>
                <th>Description</th>
                <th>Related Training</th>
                <th>Destination</th>
                <th>Duration (days)</th>
              </tr>
              <?php foreach($study_visit as $list_study_visit) { ?>
              <tr>
                <td>
                  <a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_study_visit('<?php echo $list_study_visit['id'];?>')"><i class="glyphicon glyphicon-edit"></i></a> Edit
                  <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_study_visit('<?php echo $list_study_visit['id'];?>')"><i class="glyphicon glyphicon-trash"></i></a> Hapus
                </td>
                <td><?php echo $list_study_visit['title']; ?></td>
                <td><?php echo $list_study_visit['description']; ?></td>
                <td><?php echo $list_study_visit['related_training']; ?></td>
                <td><?php echo $list_study_visit['destination']; ?></td>
                <td><?php echo $list_study_visit['duration']; ?></td>
              </tr>
              <?php } ?>
            </table>
          </div><!-- /.box-body -->

        </div><!-- /.box-body -->

    </div><!-- /.box -->



    <div class="box-footer">
      <?php         
        if ($project['ab_jumlah_workshop'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step042/".$project['id'];?>"><button type="button" class="btn btn-default">Prev</button></a>
      <?php         
        } else if ($project['ab_jumlah_training'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step041/".$project['id'];?>"><button type="button" class="btn btn-default">Prev</button></a>
      <?php         
        } else {
      ?>
      <a href="<?php echo base_url()."project/step04/".$project['id'];?>"><button type="button" class="btn btn-default">Prev</button></a>
      <?php } ?>

      <?php 
        if ($project['ab_jumlah_seminar'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step044/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Next</button></a>
      <?php         
        } else if ($project['ab_jumlah_meeting'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step045/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Next</button></a>
      <?php         
        } else if ($project['ab_jumlah_media'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step046/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Next</button></a>
      <?php         
        } else if ($project['ab_jumlah_other_activities'] > 0) {
      ?>
      <a href="<?php echo base_url()."project/step047/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Next</button></a>
      <?php         
        } else {
      ?>
      <a href="<?php echo base_url()."project/step048/".$project['id'];?>"><button type="button" class="btn btn-default pull-right">Next</button></a>
      <?php } ?>

    </div><!-- /.box-footer -->

   
  </section><!-- /.content -->
</div><!-- /.container -->

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Add Study Visit</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form">
                    <input type="hidden" value="" name="id"/> 
                    <input type="hidden" value="<?php echo $project['id'];?>" name="project_id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label">Activity Title</label>
                            <input name="title" placeholder="Title" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Activity Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Enter ..."></textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Related Training</label>
                            <input name="related_training" placeholder="Related Training" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Contribution</label>
                            <input name="contribution" placeholder="Contribution" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Destination</label>
                            <input name="destination" placeholder="Destination" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Personel</label>
                            <input name="personel" placeholder="Personel" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Duration</label>
                            <input name="duration" placeholder="Duration" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Number of flight tickets needed (roundtrip)</label>
                            <input name="ticket" placeholder="Number of roundtrip tickets" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Number of days of boarding and lodging needed</label>
                            <input name="days" placeholder="Number of days" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Indicate budget or training</label>
                            <input name="budget" placeholder="budget" class="form-control" type="text">
                            <span class="help-block"></span>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_save" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

