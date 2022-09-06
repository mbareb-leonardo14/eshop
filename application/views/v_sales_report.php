<div class="col-4">
   <div class="card card-dark">
      <div class="card-header">
         <h3 class="card-title my-2">Daily Report</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
         <?= form_open('report/daily_rep'); ?>
         <div class="row">
            <div class="col-sm-4">
               <div class="form-group">
                  <label>Date</label>
                  <select name="date" class="form-select">
                     <?php
                     $start = 1;
                     for ($i = $start; $i < $start + 31; $i++) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                     }
                     ?>
                     <option value=""></option>
                  </select>

               </div>
            </div>
            <div class="col-sm-4">
               <div class="form-group">
                  <label>Month</label>
                  <select name="month" class="form-select" value="">
                     <?php
                     $start = 1;
                     for ($i = $start; $i < $start + 12; $i++) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                     }
                     ?>
                  </select>
               </div>
            </div>
            <div class="col-sm-4">
               <div class="form-group">
                  <label>Year</label>
                  <select name="year" class="form-select"> <?= date('Y'); ?>
                     <?php
                     $start = date('Y');
                     for ($i = $start; $i < $start + 7; $i++) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                     }
                     ?>
                  </select>
               </div>
            </div>
            <!-- <div class="col-sm-12">
               <div class="form-group">
                  <input type="date" name="date" id="">
               </div>
            </div> -->
            <div class="col-sm-12">
               <div class="form-group">
                  <button type="submit" class="btn btn-default btn-block">Submit</button>
               </div>
            </div>
         </div>
         <?= form_close(); ?>
      </div>
   </div>
</div>
<div class="col-4">
   <div class="card card-dark">
      <div class="card-header">
         <h3 class="card-title my-2">Monthly Report</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
         <?= form_open('report/month_rep'); ?>
         <div class="row">
            <div class="col-sm-6">
               <div class="form-group">
                  <label>Month</label>
                  <select name="month" class="form-select" value="">
                     <?php
                     $start = 1;
                     for ($i = $start; $i < $start + 12; $i++) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                     }
                     ?>
                  </select>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="form-group">
                  <label>Year</label>
                  <select name="year" class="form-select"> <?= date('Y'); ?>
                     <?php
                     $start = date('Y');
                     for ($i = $start; $i < $start + 7; $i++) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                     }
                     ?>
                  </select>
               </div>
            </div>
            <div class="col-sm-12">
               <div class="form-group">
                  <button type="submit" class="btn btn-default btn-block">Submit</button>
               </div>
            </div>
         </div>
         <?= form_close(); ?>
      </div>
   </div>
</div>
<div class="col-4">
   <div class="card card-dark">
      <div class="card-header">
         <h3 class="card-title my-2">Annual Report</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
         <?= form_open('report/year_rep'); ?>
         <div class="row">
            <div class="col-sm-12">
               <div class="form-group">
                  <label>Year</label>
                  <select name="year" class="form-select"> <?= date('Y'); ?>
                     <?php
                     $start = date('Y');
                     for ($i = $start; $i < $start + 7; $i++) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                     }
                     ?>
                  </select>
               </div>
            </div>
            <div class="col-sm-12">
               <div class="form-group">
                  <button type="submit" class="btn btn-default btn-block">Submit</button>
               </div>
            </div>
         </div>
         <?= form_close(); ?>
      </div>
   </div>
</div>