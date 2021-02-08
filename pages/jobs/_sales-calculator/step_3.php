<!-- START OF STEP 3 -->
          <div class="card card-default step_3" style="display: none;">
            <div class="card-body">
              <!-- first row  -->
              <div class="row">
                <div class="col-12 col-sm-6">
                  <div class="form-group">
                    <label>Solar Panel</label>
                    <select id="solar_panel" required class="form-control " style="width: 100%;"   aria-hidden="true">
                      <option value="sp1">(Standard)Base Panel - 330W Silfab </option>
                      <option value="sp2">Solaria PowerXT 365W Triple Black</option>
                      <option value="sp3">Sunrun Base Panel - Longi 350W (Blk/Wht)</option>
                    </select>
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-3">
                  <div class="form-group">
                    <label>Price Per Watt</label>
                    <input class="form-control" type="text" id="step3_ppw" readonly>
                  </div>
                </div>
                <div class="col-12 col-sm-3">
                  <div class="form-group">
                    <label>Total Cost</label> &nbsp<a class="badge bg-info" style="border-radius: 10px" title="Help Content ">?</a>
                    <input class="form-control" type="text" id="step3_cost" readonly>
                  </div>
                </div>
              </div>

              <!-- 2nd row  -->

              <div class="row">
                <div class="col-12 col-sm-6">
                  <div class="form-group">
                    <label>Solar Inverter</label>
                    <select id="solar_inverter" required class="form-control " style="width: 100%;"   aria-hidden="true">
                      <option value="si2">(Standard)Solar Edge w/ Optimizers</option>
                      <option value="si3">Enphase IQ7</option>
                    </select>
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-3">
                  <div class="form-group">
                    <label>Price Per Watt</label>
                    <input class="form-control" type="text" id="step3_ppw1" readonly>

                  </div>
                </div>
                <div class="col-12 col-sm-3">
                  <div class="form-group">
                    <label>Total Cost</label>
                    <input class="form-control" type="text" id="step3_cost1" readonly>
                  </div>
                </div>
              </div>

              <!-- 3rd row  -->
              <div class="row">
                <div class="col-12 col-sm-6">
                  <div class="form-group">
                    <label>Roof Type</label>
                    <select id="roof" required class="form-control " style="width: 100%;"   aria-hidden="true">
                      <option value="roof1">(Standard)Asphalt Shingle</option>
                      <option value="roof2">Concrete Flat or S tile</option>
                      <option value="roof3">Flat Roof</option>
                      <option value="roof4">Clay/Spanish Tile </option>
                      <option value="roof5">Metal Roof</option>
                      <option value="roof6">Steep Pitch <40 Degrees</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12 col-sm-3">
                    <div class="form-group">
                      <label>Price Per Watt</label>
                      <input class="form-control" type="text" id="step3_ppw2" readonly>

                    </div>
                  </div>
                  <div class="col-12 col-sm-3">
                    <div class="form-group">
                      <label>Total Cost</label>
                      <input class="form-control" type="text" id="step3_cost2" readonly>
                    </div>
                  </div>
                </div>

              </div>

              <!-- /.card-body -->
              <div class="card-footer">
              </div>
            </div>
            <!-- END OF STEP 3 -->