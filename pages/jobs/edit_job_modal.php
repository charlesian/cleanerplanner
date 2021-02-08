<div class="modal fade" id="edit_job_modal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Job</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active " data-toggle="tab" href="#details">Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#address">Address</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#schedule">Schedule</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#price">Price</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#otherprice">Other Prices</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#invoicing">Invoicing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Transactions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Documents</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Notes</a>
          </li>
        </ul>

        <div class="tab-content">
          <div id="details" class="tab-pane fade show active p-4">
            <div class="form-group row mb-2">
              <p for="reference" class="col-sm-2 col-form-label">Reference</p>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="reference">
              </div>
            </div>
            <div class="form-group row mb-2">
              <p for="customer" class="col-sm-2 col-form-label">Customer</p>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="customer">
              </div>
            </div>

            <div class="form-group row mb-2">
              <p for="round" class="col-sm-2 col-form-label">Round</p>
              <div class="col-sm-10">
                <select class="custom-select mr-sm-2" id="round">
                  <option selected>Choose...</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div>

            <div class="form-group row mb-2">
              <p for="service" class="col-sm-2 col-form-label">Service</p>
              <div class="col-sm-10">
                <select class="custom-select mr-sm-2" id="service">
                  <option selected>Choose...</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div>

            <div class="form-group row mb-2">
              <p for="round" class="col-sm-2 col-form-label">Time</p>
              <div class="col-sm-10">
                <div class="row">
                  <div class="col">
                    <input type="number">
                    <span>hrs</span>
                  </div>
                  <div class="col">
                    <input type="number">
                    <span>mins</span>
                  </div>
                  <div class="col">
                    <input type="number">
                    <span>people</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row mb-2">
              <p for="status" class="col-sm-2 col-form-label">Status</p>
              <div class="col-sm-10">
                <select class="custom-select mr-sm-2" id="status">
                  <option selected>Choose...</option>
                  <option value="quote">Quote</option>
                  <option value="active">Active</option>
                  <option value="suspended">Suspended</option>
                  <option value="cancelled">Cancelled</option>
                  <option value="complete">Complete</option>
                  <option value="transferred">Transferred</option>
                </select>
              </div>
            </div>

          </div>
          <div id="address" class="tab-pane fade p-4">

            <div class="form-check mb-4">
              <input class="form-check-input" type="checkbox" value="" id="is_same_customer_address">
              <label class="form-check-label" for="is_same_customer_address">
                Job address is same as customer address
              </label>
            </div>


            <div class="form-group row mb-2">
              <p for="address_line_1" class="col-sm-2 col-form-label">Address Line 1</p>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="address_line_1">
              </div>
            </div>

            <div class="form-group row mb-2">
              <p for="address_line_2" class="col-sm-2 col-form-label">Address Line 2</p>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="address_line_2">
              </div>
            </div>

            <div class="form-group row mb-2">
              <p for="town" class="col-sm-2 col-form-label">Town</p>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="town">
              </div>
            </div>


            <div class="form-group row mb-2">
              <p for="country" class="col-sm-2 col-form-label">Country</p>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="country">
              </div>
            </div>

            <div class="form-group row mb-2">
              <p for="post_code" class="col-sm-2 col-form-label">Postcode</p>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="post_code">
              </div>
            </div>

          </div>
          <div id="schedule" class="tab-pane fade p-4">

            <div class="form-group row mb-2">
              <p for="due" class="col-sm-2 col-form-label">Due</p>
              <div class="col-sm-4">
                <input class="datepicker" width="276" />
              </div>
              <div class="col-sm-2 align-self-center">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    No due date
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group row mb-2">
              <p for="due" class="col-sm-2 col-form-label">Schedule</p>
              <div class="col-sm-2">
                <input type="number" class="form-control" />
              </div>
              <div class="col-sm-2">
                <select class="custom-select mr-sm-2" id="status">
                  <option value="weeks" selected>Weeks</option>
                  <option value="quote">Days</option>
                  <option value="active">Months</option>
                </select>
              </div>
              <div class="col">
                <select id="choices-multiple" placeholder="Select upto 5 tags" multiple>
                  <option value="Mon">Mon</option>
                  <option value="Tue">Tue</option>
                  <option value="Wed">Wed</option>
                  <option value="Thu">Thu</option>
                  <option value="Fri">Fri</option>
                  <option value="Sat">Sat</option>
                  <option value="Sun">Sun</option>
                </select>
              </div>

              <div class="col-sm-2 align-self-center">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    No due date
                  </label>
                </div>
              </div>

            </div>

            <div class="form-group row mb-2">
              <p for="status" class="col-sm-2 col-form-label">Status</p>
              <div class="col-sm-2">
                <select class="custom-select mr-sm-2" id="status">
                  <option selected value="No">No</option>
                  <option value="Yes">Yes</option>
                </select>
              </div>
            </div>


            <div class="form-group row mb-2">
              <div class="col-sm-2">

              </div>
              <div class="form-check col-sm-4">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  Mark as an important
                </label>
              </div>
            </div>

            <div class="form-group row mb-2">
              <p for="due" class="col-sm-2 col-form-label">Last Done</p>
              <div class="col-sm-4">
                <input class="datepicker" width="276" />
              </div>
            </div>

          </div>

          <div id="price" class="tab-pane fade p-4">
            <div class="form-group row mb-2">
              <p for="price_inc_vat" class="col-sm-2 col-form-label">Price (inc VAT)</p>
              <div class="col-sm-1">
                <input type="text" class="form-control" id="price_inc_vat">
              </div>
              <div class="col-sm-3">
                <select class="custom-select mr-sm-2" id="status">
                  <option selected value="Per Clean">Per Clean</option>
                  <option value="Per Week">Per Week</option>
                  <option value="Per Calendar Month">Per Calendar Month</option>
                  <option value="Per Calendar Year">Per Calendar Year</option>
                  <option value="Per Schedule Month">Per Schedule Month</option>
                  <option value="Per Schedule Year">Per Schedule Year</option>
                  <option value="Per Hour">Per Hour</option>
                </select>
              </div>
            </div>

            <div class="form-group row mb-2">
              <p for="price_inc_vat" class="col-sm-2 col-form-label">VAT</p>
              <div class="col-sm-1">
                <input type="text" class="form-control" id="price_inc_vat">
              </div>
              <div class="col-sm-3">
                <select class="custom-select mr-sm-2" id="status">
                  <option selected value="Per Clean">0%</option>
                  <option value="Per Week">5%</option>
                  <option value="Per Week">10%</option>
                  <option value="Per Week">20%</option>
                </select>
              </div>
            </div>

            <div class="form-group row mb-2">
              <p for="price_inc_vat" class="col-sm-2 col-form-label">Price (exc VAT)</p>
              <div class="col-sm-1">
                <input type="text" class="form-control" id="price_inc_vat">
              </div>
              <div class="col-sm-1 align-self-center">
                <p class="m-0 text-center">since</p>
              </div>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="price_inc_vat">
              </div>
              <div class="col-sm-2">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    Show on worksheet
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group row mb-2">
              <p for="price_inc_vat" class="col-sm-2 col-form-label">Payment Method</p>
              <div class="col-sm-4">
                <select class="custom-select mr-sm-2" id="status">
                  <option selected value="Cash">Cash</option>
                  <option selected value="Cheque">Cheque</option>
                  <option selected value="Transfer">Transfer</option>
                </select>
              </div>
            </div>

            <div class="form-group row mb-2">
              <p for="price_inc_vat" class="col-sm-2 col-form-label">Payment Reference</p>
              <div class="col-sm-4">
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="form-group row mb-2">
              <p for="price_inc_vat" class="col-sm-2 col-form-label">Start Balance</p>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="price_inc_vat">
              </div>
              <div class="col-sm-1 align-self-center">
                <p class="m-0 text-center">as of</p>
              </div>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="price_inc_vat">
              </div>
            </div>

          </div>

          <div id="otherprice" class="tab-pane fade p-4">
            <div class="border-bottom mb-4">
              <h5 for="" class="text-primary">First Clean</h5>
            </div>
            <div class="form-group row mb-2">
              <p for="price_inc_vat" class="col-sm-2 col-form-label">Price (inc VAT)</p>
              <div class="col-sm-1">
                <input type="text" class="form-control" id="price_inc_vat">
              </div>
              <div class="col align-self-center">
                <p class="m-0">(leave blank if same as standard price)</p>
              </div>
            </div>

            <div class="form-group row mb-2">
              <p for="price_inc_vat" class="col-sm-2 col-form-label">VAT</p>
              <div class="col-sm-1">
                <input type="text" class="form-control" id="price_inc_vat">
              </div>
              <div class="col-sm-3">
                <select class="custom-select mr-sm-2" id="status">
                  <option selected value="Per Clean">0%</option>
                  <option value="Per Week">5%</option>
                  <option value="Per Week">10%</option>
                  <option value="Per Week">20%</option>
                </select>
              </div>
            </div>

            <div class="form-group row mb-2">
              <p for="price_inc_vat" class="col-sm-2 col-form-label">Price (exc VAT)</p>
              <div class="col-sm-1">
                <input type="text" class="form-control" id="price_inc_vat">
              </div>
            </div>


            <div class="border-bottom my-4">
              <h5 for="" class="text-primary">Alternative Cleans</h5>
            </div>
            <div class="form-group row mb-2">
              <p for="price_inc_vat" class="col-sm-2 col-form-label">Price (inc VAT)</p>
              <div class="col-sm-1">
                <input type="text" class="form-control" id="price_inc_vat">
              </div>
              <div class="col align-self-center">
                <p class="m-0">(leave blank if same as standard price)</p>
              </div>
            </div>

            <div class="form-group row mb-2">
              <p for="price_inc_vat" class="col-sm-2 col-form-label">VAT</p>
              <div class="col-sm-1">
                <input type="text" class="form-control" id="price_inc_vat">
              </div>
              <div class="col-sm-3">
                <select class="custom-select mr-sm-2" id="status">
                  <option selected value="Per Clean">0%</option>
                  <option value="Per Week">5%</option>
                  <option value="Per Week">10%</option>
                  <option value="Per Week">20%</option>
                </select>
              </div>
            </div>

            <div class="form-group row mb-2">
              <p for="price_inc_vat" class="col-sm-2 col-form-label">Price (exc VAT)</p>
              <div class="col-sm-1">
                <input type="text" class="form-control" id="price_inc_vat">
              </div>
            </div>


            <div class="form-group row mb-2">
              <p for="price_inc_vat" class="col-sm-2 col-form-label">Next Price</p>
              <div class="col-sm-3">
                <select class="custom-select mr-sm-2" id="status">
                  <option selected value="Standard">Standard</option>
                  <option selected value="Alternate">Alternate</option>
                </select>
              </div>
              <div class="col align-self-center">
                <p class="m-0">(switches automatically after each clean)</p>
              </div>
            </div>

           

          </div>

          <div id="invoicing" class="tab-pane fade p-4">
            <div class="form-group row mb-2">
              <p for="price_inc_vat" class="col-sm-2 col-form-label">Invoice PO Number</p>
              <div class="col-sm-4">
                <input type="text" class="form-control">
              </div>
              <div class="col-sm-2 align-self-center">
                <div class="form-check mb-4">
                  <input class="form-check-input" type="checkbox" value="" id="is_same_customer_address">
                  <label class="form-check-label" for="is_same_customer_address">
                    Requires invoice
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group row mb-2">
              <p for="price_inc_vat" class="col-sm-2 col-form-label">Invoice Property/Scheme</p>
              <div class="col-sm-4">
                <input type="text" class="form-control">
              </div>
              <div class="col align-self-center">
                <p>
                  (will appear as first line of invoice address c/o customer)
                </p>
              </div>
            </div>
            <div class="form-group row mb-2">
              <p for="price_inc_vat" class="col-sm-2 col-form-label">Invoice Description</p>
              <div class="col-sm-4">
                <input type="text" class="form-control">
              </div>
            </div>
          </div>


         


        </div>






      </div>

      <div class="modal-footer d-flex justify-content-between">
        <button type="button" class="btn btn-light text-primary" id="save">Save Job</button>
        <button type="button" class="btn btn-light text-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>