     <style type="text/css">
       @media all and (min-width: 480px) {
         .phoneContent {
           display: none;
         }

         .phoneContent2 {
           display: block;
         }
       }

       @media all and (max-width: 479px) {
         .phoneContent {
           display: block;
         }
       }

       @media screen and (max-width: 600px) {
         .phoneContent2 {
           display: none;
           visibility: hidden;
         }

       }
     </style>
     <div id="new_customer">

       <div class="row">
         <!-- start row -->
         <div class="col-md-2">
           <div class="form-group">

           </div>
         </div>
       </div>

       <div class="card card-default collapsed-card">
         <div class="card-header">
           <div class="card-tools float-left">
             Filters
             <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
             <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
           </div>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
           <div class="row">
             <div class="col-md-1">
               <div class="form-group">
                 <label><a class="btn btn-default" id="add_job" data-toggle="modal" data-target="#modal-xl"><i class="fa fa-plus"></i> Add job</a></label>
               </div>
             </div>
             <div class="col-md-1">
               <div class="form-group">
                 <a href=""><i class="fa fa-download"></i> Export</a>
               </div>
             </div>
             <div class="col-md-1 phoneContent2" style="margin-left: -50px;">
               <div class="form-group">
                 <a href=""><i class="fa fa-print"></i> Print</a>
               </div>
             </div>
             <div class="col-md-1 phoneContent">
               <div class="form-group">
                 <a href=""><i class="fa fa-print"></i> Print</a>
               </div>
             </div>
             <div class="col-md-1">
               <div class="form-group">
                 <select id="filter_round" class="form-control">
                   <option selected>All Rounds</option>
                   <?php
                    include '../includes/config.php';
                    $selectrounds = mysqli_query($conn, "SELECT * FROM tbl_round");
                    while ($rowr = mysqli_fetch_array($selectrounds)) {
                      $round = $rowr['round'];
                    ?>
                     <option><?php echo $round ?></option>
                   <?php }  ?>
                 </select>
               </div>
             </div>
             <div class="col-md-1">
               <div class="form-group">
                 <select id="filter_service" class="form-control">
                   <option selected>All Services</option>
                   <?php
                    $selectservice = mysqli_query($conn, "SELECT * FROM tbl_service");
                    while ($rows = mysqli_fetch_array($selectservice)) {
                      $service = $rows['service'];
                    ?>
                     <option><?php echo $service ?></option>
                   <?php }  ?>
                 </select>
               </div>
             </div>
             <div class="col-md-1">
               <div class="form-group">
                 <select id="filter_due_dates" class="form-control">
                   <option selected>All Due Dates</option>
                   <option>Overdue</option>
                   <option>Due</option>
                   <option>Due Today</option>
                   <option>Due Tomorrow</option>
                   <option>Due This Week</option>
                   <option>Due Next Week</option>
                   <option>Not Yet Due</option>
                   <option>Custom</option>
                 </select>
               </div>
             </div>
             <div class="col-md-2">
               <div class="form-group">
                 <!-- <input type="date" id="filter_due_date_from" class="form-control" > -->
                 <input placeholder="Date From" class="form-control" id="filter_due_date_from" type="text" onfocus="(this.type='date')" readonly>
               </div>
               <small>This Field will be enabled if you pick "custom" option in all due dates field</small>
             </div>
             <div class="col-md-2">
               <div class="form-group">
                 <!-- <input type="date" id="filter_due_date_to" class="form-control" > -->
                 <input placeholder="Date To" class="form-control" id="filter_due_date_to" type="text" onfocus="(this.type='date')" readonly>
               </div>
               <small>This Field will be enabled if you pick "custom" option in all due dates field</small>
             </div>
             <div class="col-md-1">
               <div class="form-group">
                 <select id="filter_quote" class="form-control">
                   <option selected>All Statuses</option>
                   <option>Quote / Active</option>
                   <option>Quote</option>
                   <option>Active</option>
                   <option>Suspended</option>
                   <option>Canceled</option>
                   <option>Complete</option>
                   <option>Transfered</option>
                 </select>
               </div>
             </div>
             <div class="col-md-1">
               <a id="search_filter" class="btn btn-xs btn-success"><i class="fa fa-fw fa-search"></i>Search</a>
             </div>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-1">
           <div class="form-group">
             <a href="#" style="color:blue;" id="auto_select"><u style="display: none;">Auto Select</u></a>
           </div>
         </div>
         <div class="col-md-1">
           <div class="form-group">
             <input type="text" id="show_auto_select_field" class="form-control" style="display: none;">
           </div>
         </div>
         <div class="col-md-1">
           <div class="form-group">
             <button class="btn btn-default btn-xs" disabled id="show_total_selected_cal">
               <font id="count_jobs"></font>Jobs £ <font id="sum_pound"></font>
             </button>
           </div>
         </div>
         <div class="col-md-1">
           <div class="form-group">
             <input class="btn btn-default btn-xs" id="add_worksheet2" value="Add to Worksheet" style="display: none;width: 100%;" />
             <input class="btn btn-default btn-xs" disabled id="add_worksheet" value="Add to Worksheet" style="width: 100%;" />
           </div>
         </div>
         <div class="col-md-1">
           <div class="form-group">
             <input class="btn btn-default btn-xs" id="job_change_due_date2" value="Change Due Date" style="display: none;width: 100%;" />
             <input class="btn btn-default btn-xs" disabled id="job_change_due_date" value="Change Due Date" style="width: 100%;" />
           </div>
         </div>
         <div class="col-md-1">
           <div class="form-group">
             <input class="btn btn-default btn-xs" id="job_move_round" 2 value="Move to Round" style="display: none;width: 100%;" />
             <input class="btn btn-default btn-xs" disabled id="job_move_round" value="Move to Round" style="width: 100%;" />
           </div>
         </div>
         <div class="col-md-1">
           <div class="form-group">
             <input class="btn btn-default btn-xs" id="job_build_edit2" value="Bulk Edit" style="display: none;width: 100%;" />
             <input class="btn btn-default btn-xs" disabled id="job_build_edit" value="Bulk Edit" style="width: 100%;" />
           </div>
         </div>
         <div class="col-md-1">
           <div class="form-group">
             <input class="btn btn-default btn-xs" id="job_send_email2" value="Send Email" style="display: none;width: 100%;" />
             <input class="btn btn-default btn-xs" disabled id="job_send_email" value="Send Email" style="width: 100%;" />
           </div>
         </div>
       </div>
     </div>

     <!-- /.card-body -->

     <div class="table-responsive" style="position: relative; height: 100%; width: 100%;">
       <div class="row " style="margin-bottom: -3.5%;">
         <div class="col-md-4">
           <div class="form-group">


           </div>
         </div>
         <div class="col-md-1 done" style="padding-left:100px;">
           <div class="form-group">
             <a id="done" class="btn btn-default btn-xs text-uppercase mb-2 rounded-pill shadow-sm" style="text-align: center;"><i class="fa fa-check"></i></a>
           </div>
         </div>
         <div class="col-md-2 text-center">
           <div class="form-group">
             <select id="test">
               <option value="jobs_sched_date">Due</option>
               <option value="Worksheet">Worksheet</option>
               <option value="Stats">New</option>
               <option value="job_ref">Job Ref</option>
               <option value="cust_ref">Cust Ref</option>
               <option value="cust_address1">Address 1</option>
               <option value="cust_address2">Address 2</option>
               <option value="cust_town">Town</option>
               <option value="cust_country">Country</option>
               <option value="cust_postcode">Postcode</option>
               <option value="cust_fname,cust_lname">Name</option>
               <option value="cust_phone">Phone</option>
               <option value="cust_mobile">Mobile</option>
               <option value="cust_email">Email</option>
               <option value="d_w_m_option1">Shedule</option>
               <option value="jobs_price1">Price</option>
               <option value="my_round">Round</option>
               <option value="job_id">Order</option>
               <option value="stats">Status</option>
             </select>
           </div>
         </div>


       </div>
       <div class="phoneContent float-right" style="color:blue;"><i class="fa fa-arrow-left"></i> <i class="fa fa-arrow-right"></i><b> Scroll Right/Left</b></div>
       <table id="jobs_table" class="table">
         <thead>
         </thead>
         <tbody>
         </tbody>
       </table>
     </div>


     <?php include 'modal_one.php'; ?>
     <?php include 'modal_plus.php'; ?>
     <?php include 'modal_plus1.php'; ?>
     <?php include 'modal_plus2.php'; ?>
     <?php include 'modal_plus3.php'; ?>
     <?php include 'edit_job_modal.php'; ?>
