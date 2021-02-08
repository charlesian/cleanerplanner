<div  id="modal_one_part2">
<div class="row" >
 <div class="col-md-2" >
  <div class="form-group">
    <label>Job Ref</label>
  </div>
</div>
<div class="col-md-3" >
  <div class="form-group">
    <input type="text" id="job_ref" placeholder="Job Ref(auto-assigned)" class="form-control">
  </div>
</div>
<div class="col-md-2" >
  <div class="form-group">
    <input type="checkbox" id="checkbox_ref1"  > <i class="fa fa-calculator"></i> Quote
  </div>
</div>
<div class="col-md-2" >
  <div class="form-group">
    <input type="checkbox" id="checkbox_ref2"  > <i class="fa fa-exclamation-circle"></i> Important
  </div>
</div>

<div class="col-md-2" >
  <div class="form-group">
    <input type="checkbox" id="checkbox_ref3"  > <i class="fa fa-bell"></i> Remind customer
  </div>
</div>
</div>

<div class="row on_check_job_diff" style="display: none;">
   <div class="col-md-2" >
    <div class="form-group">
      <label>Job Address</label>
    </div>
  </div>
  <div class="col-md-4" >
    <div class="form-group">
      <input type="text" id="job_address1" placeholder="Address Line 1" class="form-control">
    </div>
  </div>
  <div class="col-md-4" >
    <div class="form-group">
      <input type="text" id="job_address2" placeholder="Address Line 2" class="form-control">
    </div>
  </div>
</div>

<div class="row on_check_job_diff" style="display: none;">
   <div class="col-md-2" >
    <div class="form-group">
      <label></label>
    </div>
  </div>
  <div class="col-md-3" >
    <div class="form-group">
      <input type="text" id="job_town" placeholder="Town" class="form-control">
    </div>
  </div>
  <div class="col-md-3" >
    <div class="form-group">
      <input type="text" id="job_country" placeholder="Country" class="form-control">
    </div>
  </div>
   <div class="col-md-2" >
    <div class="form-group">
      <input type="text" id="job_postcode" placeholder="Postcode" class="form-control">
    </div>
  </div>
</div>

<div class="row">
 <div class="col-md-2" >
  <div class="form-group">
    <label>Round / Service</label>
  </div>
</div>
<div class="col-md-2" >
  <div class="form-group">
    <select class="form-control" id="my_round">
      <option selected disabled></option>
    </select>
  </div>
</div>
<div class="col-md-1" >
  <div class="form-group">
    <a class="btn"  data-toggle="modal" data-target="#modal-default1"><i class="fa fa-plus" style="color:blue;"></i></a>
  </div>
</div>

<div class="col-md-2" >
  <div class="form-group">
    <select class="form-control" id="window_cleaning">
      <option disabled selected></option>
    </select>
  </div>
</div>
<div class="col-md-1" >
  <div class="form-group">
    <a class="btn"  data-toggle="modal" data-target="#modal-default2"><i class="fa fa-plus" style="color:blue;"></i></a>
  </div>
</div>

<div class="col-md-1" >
  <div class="form-group">
    <input type="number" id="job_hrs" class="form-control" placeholder="hrs"> 
  </div>
</div>

<div class="col-md-1" >
  <div class="form-group">
    <input type="number" id="job_mins" class="form-control" placeholder="mins"> 
  </div>
</div>

<div class="col-md-1" >
  <div class="form-group">
    <input type="number" id="job_ppl" class="form-control" placeholder="people"> 
  </div>
</div>



</div>



<div class="row">
 <div class="col-md-2" >
  <div class="form-group">
    <label>Schedule</label>
  </div>
</div>
<div class="col-md-2" id="jobs_sched_date_col">
  <div class="form-group">
    <div class="input-group date">
      <input type="date" class="form-control pull-right" id="jobs_sched_date"  placeholder="Due">
    </div>
  </div>
</div>
<div class="col-md-2" >
  <div class="form-group">
    <input type="checkbox" id="no_due"> No Due Date
  </div>
</div>

<div class="col-md-1 one_off" >
  <div class="form-group">
    <input type="number" class="form-control"  id="number_d_w_m">
  </div>
</div>
<div class="col-md-2 one_off" >
  <div class="form-group">
    <select class="form-control" id="d_w_m_option1">
      <option disabled selected></option>
      <option>Days</option>
      <option>Weeks</option>
      <option>Monhts</option>
    </select>
  </div>
</div>

<div class="col-md-2 one_off" >
  <div class="form-group">
    <select class="form-control" id="d_w_m_option2">
      <option disabled selected></option>
      <option>Any Day</option>
      <option>Mon</option>
      <option>Tue</option>
      <option>Wed</option>
      <option>Thu</option>
      <option>Fri</option>
      <option>Sat</option>
      <option>Sun</option>
    </select>
  </div>
</div>

<div class="col-md-1" >
  <div class="form-group">
    <input type="checkbox" id="sched_checkbox" > One off
  </div>
</div>

</div>

<div class="row">
 <div class="col-md-2" >
  <div class="form-group">
    <label>Price</label>
  </div>
</div>
  <div class="form-group">
    £
    </div>
<div class="col-md-1" >
  <div class="form-group">
    <input type="number" id="jobs_price1" class="form-control">
  </div>
</div>
<div class="col-md-2" >
  <div class="form-group">
    <select class="form-control" id="per_jobs">
      <option disabled selected></option>
      <option>Per Clean</option>
      <option>Per Week</option>
      <option>Per Calendar Month</option>
      <option>Per Calendar Year</option>
      <option>Per Schedule Month</option>
      <option>Per Schedule Year</option>
      <option>Per Hour</option>
    </select>
  </div>
</div>
  <div class="form-group">
    First £
    </div>
<div class="col-md-2" >
  <div class="form-group">
   <input type="number" id="jobs_price2" class="form-control" placeholder="optional">
  </div>
</div>
  <div class="form-group">
    Alternate £
    </div>
<div class="col-md-2" >
  <div class="form-group">
   <input type="number" id="jobs_price3" class="form-control" placeholder="optional">
  </div>
</div>

<div class="col-md-1" >
  <div class="form-group">
    <input type="checkbox" id="checkbox_job_price" > Show price on worksheet
  </div>
</div>

</div>


<div class="row">
 <div class="col-md-2" >
  <div class="form-group">
    <label>Payment Method</label>
  </div>
</div>
<div class="col-md-2" >
  <div class="form-group">
    <select class="form-control" id="payment_method">
      <option disabled selected></option>
      <option>Cash</option>
      <option>Cheque</option>
      <option>Transfer</option>
    </select>
  </div>
</div>
<div class="col-md-1" >
  <div class="form-group">
    <a class="btn"  data-toggle="modal" data-target="#modal-default3"><i class="fa fa-plus" style="color:blue;"></i></a>
</div>
</div>
  <div class="form-group">
   <input type="checkbox" id="checkbox_jobs_invoice">
    <i class="fa fa-folder"></i>
    </div>
<div class="col-md-2" >
  <div class="form-group">
    <label>Requires invoice</label>
  </div>
</div>



</div>


<div class="row job_section_invoice" style="display: none;">
 <div class="col-md-2" >
  <div class="form-group">
    <label>Invoicing</label>
  </div>
</div>
<div class="col-md-2" >
  <div class="form-group">
   <input type="text" class="form-control" placeholder="PO Number (optional)">
  </div>
</div>

<div class="col-md-4" >
  <div class="form-group">
   <input type="text" class="form-control" placeholder ="Invoice Description (Leave it blank to use defaul)"> 
  </div>
</div>

<div class="col-md-3" >
  <div class="form-group">
   (you can overwrite this later)
  </div>
</div>




</div>



<div class="row job_section_invoice" style="display: none;">
  <div class="col-md-2" >
  <div class="form-group">
    <label></label>
  </div>
</div>
<div class="col-md-4" >
  <div class="form-group">
   <input type="text" class="form-control" placeholder="Managed Propoerty/Scheme Name (optional)">
  </div>
</div>

<div class="col-md-5" >
  <div class="form-group">
   (will appear as first line of invoice address c/o customer)
  </div>
</div>
</div>

<hr>

<div class="row">
  <div class="col-md-2" >
  <div class="form-group">
    <label>Note</label>
  </div>
</div>
<div class="col-md-5" >
  <div class="form-group">
    <textarea rows="2" class="form-control" id="job_notes"> </textarea>
  </div>
</div>

<div class="col-md-5" >
  <div class="form-group">
    <input type="checkbox" id="checkbox_notes"> Show note on worksheet
  </div>
</div>
</div>
</div>
