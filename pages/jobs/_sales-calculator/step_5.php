<!-- START OF STEP 4 -->
            <div class="card card-default step_5" style="display: none;">
              <div class="card-body">
                <!-- header row  -->
              <div class="row">
                  <div class="col-12 col-sm-4">
                    <div class="form-group">
                      <label>Adders Per Unit</label>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <label>Yes/No</label>
                    </div>
                  </div>
                  <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <label>Qty</label>
                    </div>
                  </div>
                  <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <label>Price Per Watt</label>
                    </div>
                  </div>
                  <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <label>Cost</label> &nbsp<a class="badge bg-info" style="border-radius: 10px" title="Help Content ">?</a>
                    </div>
                  </div>
                </div>
                <!-- first row  -->
                <div class="row">
                  <div class="col-12 col-sm-4">
                    <div class="form-group">
                      <input class="form-control " type="text" id="mpu_upgrade" value="MPU Upgrade">
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <div class="col-12 col-sm-2">
                    <div class="form-group">
                    <select id="step5_yn" required class="form-control " style="width: 100%;"   aria-hidden="true">
                        <option>No</option>
                        <option>Yes</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <input class="form-control" type="text" id="step5_qty" >
                    </div>
                  </div>
                  <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <input class="form-control" type="text" id="step5_ppw" readonly>
                    </div>
                  </div>
                  <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <input class="form-control" type="text" id="step5_cost" readonly>
                    </div>
                  </div>
                </div>

                <!-- 2nd row  -->

                <div class="row">
                  <div class="col-12 col-sm-4">
                    <div class="form-group">
                      <input class="form-control " type="text" id="Line_side" value="Line Side Tap (RMA or GMA)">
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <div class="col-12 col-sm-2">
                    <div class="form-group">
                       <select id="step5_yn2" required class="form-control " style="width: 100%;"   aria-hidden="true">
                        <option>No</option>
                        <option>Yes</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <input class="form-control" type="text" id="step5_qty2" >
                    </div>
                  </div>
                  <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <input class="form-control" type="text" id="step5_ppw2" readonly>
                    </div>
                  </div>
                  <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <input class="form-control" type="text" id="step5_cost2" readonly>
                    </div>
                  </div>
                </div>

 <!-- 3rd row  -->
                <div class="row">
                  <div class="col-12 col-sm-4">
                    <div class="form-group">
                      <input class="form-control " type="text" id="system_size" value="Small System Size Less than 4kw">
                      </div>
                    </div>
                    <div class="col-12 col-sm-2">
                      <div class="form-group">
                         <select id="step5_yn3" required class="form-control " style="width: 100%;"   aria-hidden="true">
                        <option>No</option>
                        <option>Yes</option>
                      </select>

                      </div>
                    </div>
                    <div class="col-12 col-sm-2">
                      <div class="form-group">
                        <input class="form-control" type="text" id="step5_qty3" >
                      </div>
                    </div>
                    <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <input class="form-control" type="text" id="step5_ppw3" readonly>
                    </div>
                  </div>
                  <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <input class="form-control" type="text" id="step5_cost3" readonly>
                    </div>
                  </div>
                  </div>
<!--4th row  -->
                <div class="row">
                  <div class="col-12 col-sm-4">
                    <div class="form-group">
                      <input class="form-control " type="text" id="ground_mounts" value="Ground Mounts (<8KW)">
                      </div>
                    </div>
                    <div class="col-12 col-sm-2">
                      <div class="form-group">
                         <select id="step5_yn4" required class="form-control " style="width: 100%;"   aria-hidden="true">
                        <option>No</option>
                        <option>Yes</option>
                      </select>

                      </div>
                    </div>
                    <div class="col-12 col-sm-2">
                      <div class="form-group">
                        <input class="form-control" type="text" id="step5_qty4" >
                      </div>
                    </div>
                    <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <input class="form-control" type="text" id="step5_ppw4" readonly>
                    </div>
                  </div>
                  <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <input class="form-control" type="text" id="step5_cost4" readonly>
                    </div>
                  </div>
                  </div>



                <!-- 5th row  -->
                <div class="row">
                  <div class="col-12 col-sm-4">
                    <div class="form-group">
                      <input class="form-control " type="text" id="lgm_battery98" value="LG Chem Battery 9.8 KWH (Battery Only)">
                      </div>
                    </div>
                    <div class="col-12 col-sm-2">
                      <div class="form-group">
                         <select id="step5_yn5" required class="form-control " style="width: 100%;"   aria-hidden="true">
                        <option>No</option>
                        <option>Yes</option>
                      </select>

                      </div>
                    </div>
                    <div class="col-12 col-sm-2">
                      <div class="form-group">
                        <input class="form-control" type="text" id="step5_qty5" >
                      </div>
                    </div>
                    <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <input class="form-control" type="text" id="step5_ppw5" readonly>
                    </div>
                  </div>
                  <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <input class="form-control" type="text" id="step5_cost5" readonly>
                    </div>
                  </div>
                  </div>

                   <!-- 6th row  -->
                <div class="row">
                  <div class="col-12 col-sm-4">
                    <div class="form-group">
                      <input class="form-control " type="text" id="lgm_battery196" value="LG Chem Battery 19.6 KWH (Battery Only)">
                      </div>
                    </div>
                    <div class="col-12 col-sm-2">
                      <div class="form-group">
                         <select id="step5_yn6" required class="form-control " style="width: 100%;"   aria-hidden="true">
                        <option>No</option>
                        <option>Yes</option>
                      </select>

                      </div>
                    </div>
                    <div class="col-12 col-sm-2">
                      <div class="form-group">
                        <input class="form-control" type="text" id="step5_qty6" >
                      </div>
                    </div>
                    <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <input class="form-control" type="text" id="step5_ppw6" readonly>
                    </div>
                  </div>
                  <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <input class="form-control" type="text" id="step5_cost6" readonly>
                    </div>
                  </div>
                  </div>

                   <!-- 7th row  -->
                <div class="row">
                  <div class="col-12 col-sm-4">
                    <div class="form-group">
                      <input class="form-control " type="text" id="lgm_battery98pv" value="LG Chem Battery 9.8 KWH (PV+Battery)">
                      </div>
                    </div>
                    <div class="col-12 col-sm-2">
                      <div class="form-group">
                         <select id="step5_yn7" required class="form-control " style="width: 100%;"   aria-hidden="true">
                        <option>No</option>
                        <option>Yes</option>
                      </select>

                      </div>
                    </div>
                    <div class="col-12 col-sm-2">
                      <div class="form-group">
                        <input class="form-control" type="text" id="step5_qty7" >
                      </div>
                    </div>
                    <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <input class="form-control" type="text" id="step5_ppw7" readonly>
                    </div>
                  </div>
                  <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <input class="form-control" type="text" id="step5_cost7" readonly>
                    </div>
                  </div>
                  </div>


                   <!-- 8th row  -->
                <div class="row">
                  <div class="col-12 col-sm-4">
                    <div class="form-group">
                      <input class="form-control " type="text" id="lgm_battery196pv" value="LG Chem Battery 19.6 KWH (PV+Battery)">
                      </div>
                    </div>
                    <div class="col-12 col-sm-2">
                      <div class="form-group">
                         <select id="step5_yn8" required class="form-control " style="width: 100%;"   aria-hidden="true">
                        <option>No</option>
                        <option>Yes</option>
                      </select>

                      </div>
                    </div>
                    <div class="col-12 col-sm-2">
                      <div class="form-group">
                        <input class="form-control" type="text" id="step5_qty8" >
                      </div>
                    </div>
                    <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <input class="form-control" type="text" id="step5_ppw8" readonly>
                    </div>
                  </div>
                  <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <input class="form-control" type="text" id="step5_cost8" readonly>
                    </div>
                  </div>
                  </div>


                   <!-- 9th row  -->
                <div class="row">
                  <div class="col-12 col-sm-4">
                    <div class="form-group">
                      <input class="form-control " type="text" id="solar_edge" value="SolarEdge Inverter w/ EV Charger (Level 2)">
                      </div>
                    </div>
                    <div class="col-12 col-sm-2">
                      <div class="form-group">
                         <select id="step5_yn9" required class="form-control " style="width: 100%;"   aria-hidden="true">
                        <option>No</option>
                        <option>Yes</option>
                      </select>

                      </div>
                    </div>
                    <div class="col-12 col-sm-2">
                      <div class="form-group">
                        <input class="form-control" type="text" id="step5_qty9" >
                      </div>
                    </div>
                    <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <input class="form-control" type="text" id="step5_ppw9" readonly>
                    </div>
                  </div>
                  <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <input class="form-control" type="text" id="step5_cost9" readonly>
                    </div>
                  </div>
                  </div>

                   <!-- 10th row  -->
                <div class="row">
                  <div class="col-12 col-sm-4">
                    <div class="form-group">
                      <input class="form-control " type="text" id="kw10_generac" value="10KW Generac Generator">
                      </div>
                    </div>
                    <div class="col-12 col-sm-2">
                      <div class="form-group">
                         <select id="step5_yn10" required class="form-control " style="width: 100%;"   aria-hidden="true">
                        <option>No</option>
                        <option>Yes</option>
                      </select>

                      </div>
                    </div>
                    <div class="col-12 col-sm-2">
                      <div class="form-group">
                        <input class="form-control" type="text" id="step5_qty10" >
                      </div>
                    </div>
                    <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <input class="form-control" type="text" id="step5_ppw10" readonly>
                    </div>
                  </div>
                  <div class="col-12 col-sm-2">
                    <div class="form-group">
                      <input class="form-control" type="text" id="step5_cost10" readonly>
                    </div>
                  </div>
                  </div>









                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                </div>
              </div>
              <!-- END OF STEP 4 -->