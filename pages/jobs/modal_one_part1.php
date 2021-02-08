<div class="row" >
        <!-- start row -->
        <div class="col-md-2" >
          <div class="form-group">
            <label>Type</label>
          </div>
        </div>
        <div class="col-md-2" >
          <div class="form-group">
            <input type="radio" name="radio" class="new_cust" checked> <a class="">New Customer</a>
          </div>
        </div>

        <div class="col-md-4" >
          <div class="form-group">
            <input type="radio" name="radio" class="new_cust_diff" > <a class="">New Customer (Job at different address)</a>
          </div>
        </div>

        <div class="col-md-3" >
          <div class="form-group">
            <input type="radio" name="radio" class="exist_cust" > <a class="">Existing Customer</a>
          </div>
        </div>
      </div>

  <div class="row" style="display: none;" id="show_exist_cust_fields"> 
       <div class="col-md-2" >
        <div class="form-group">
          <label>Customer</label>
        </div>
      </div>

       <div class="col-md-3" >
        <div class="form-group">
          <select class="form-control select2" id="customer_dropdown">
            <option selected disabled></option>
          </select> 
        </div>
      </div>


      <div class="col-md-3" >
        <div class="form-group">
          <input type="checkbox" id="checkbox_job_diff" data-name="checkbox_job_diff"> Job is at different address
        </div>
      </div>

     
    </div>

<div id="modal_one_part1" >
      <div class="row">
       <div class="col-md-2" >
        <div class="form-group">
          <label>Customer Ref</label>
        </div>
      </div>

      <div class="col-md-3" >
        <div class="form-group">
          <input type="text" id="cust_ref" placeholder="Customer Ref (auto-assigned)" class="form-control">
        </div>
      </div>

      <div class="col-md-3" >
        <div class="form-group">
          <select class="form-control" id="source_dropdown">
            <option selected disabled></option>
          </select> 
        </div>
      </div>

      <div class="col-md-3" >
        <div class="form-group">
          <a class="btn" id="add_source" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus" style="color:blue;"></i></a>
        </div>
      </div>

    </div>
    <div class="row">
     <div class="col-md-2" >
      <div class="form-group">
        <label>Name</label>
      </div>
    </div>
    <div class="col-md-2" >
      <div class="form-group">
        <select class="form-control" id="cust_title">
          <option selected disabled></option>
          <option>Mr & Mrs</option>
          <option>Mrs</option>
          <option>Mr</option>
          <option>Miss</option>
          <option>Ms</option>
          <option>Dr</option>
        </select> 
      </div>
    </div>
    <div class="col-md-2" >
      <div class="form-group">
        <input type="text" id="cust_fname" placeholder="First Name" class="form-control">
      </div>
    </div>
    <div class="col-md-2" >
      <div class="form-group">
        <input type="text" id="cust_lname" placeholder="Last Name" class="form-control">
      </div>
    </div>
    <div class="col-md-2" >
      <div class="form-group">
        <input type="text" id="cust_company" placeholder="Company Name" class="form-control">
      </div>
    </div>


  </div>
  <div class="row">
   <div class="col-md-2" >
    <div class="form-group">
      <label>Address</label>
    </div>
  </div>
  <div class="col-md-4" >
    <div class="form-group">
      <input type="text" id="cust_address1" placeholder="Address Line 1" class="form-control">
    </div>
  </div>
  <div class="col-md-4" >
    <div class="form-group">
      <input type="text" id="cust_address2" placeholder="Address Line 2" class="form-control">
    </div>
  </div>
</div>

<div class="row">
   <div class="col-md-2" >
    <div class="form-group">
      <label></label>
    </div>
  </div>
  <div class="col-md-3" >
    <div class="form-group">
      <input type="text" id="cust_town" placeholder="Town" class="form-control">
    </div>
  </div>
  <div class="col-md-3" >
    <div class="form-group">
      <input type="text" id="cust_country" placeholder="Country" class="form-control">
    </div>
  </div>
   <div class="col-md-2" >
    <div class="form-group">
      <input type="text" id="cust_postcode" placeholder="Postcode" class="form-control">
    </div>
  </div>
</div>

<div class="row">
   <div class="col-md-2" >
    <div class="form-group">
      <label>Phone / Email</label>
    </div>
  </div>
  <div class="col-md-3" >
    <div class="form-group">
      <input type="text" id="cust_mobile" placeholder="Mobile" class="form-control">
    </div>
  </div>
  <div class="col-md-3" >
    <div class="form-group">
      <input type="text" id="cust_phone" placeholder="Phone" class="form-control">
    </div>
  </div>
   <div class="col-md-2" >
    <div class="form-group">
      <input type="text" id="cust_email" placeholder="Email" class="form-control">
    </div>
  </div>
</div>
</div>