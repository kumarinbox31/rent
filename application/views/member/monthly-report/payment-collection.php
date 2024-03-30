  <?php 
    $month = @$_POST['month'] ?? date('m');
    $year = @$_POST['year'] ?? date('Y');
  ?>
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Reading
                <small class="text-muted"></small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">                
                <button class="btn btn-primary btn-icon btn-round hidden-sm-down float-right m-l-10" type="button">
                    <i class="zmdi zmdi-plus"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="/admin"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Monthly Report</a></li>
                    <li class="breadcrumb-item active">Reading</li>
                </ul>                
            </div>
        </div>
    </div>
    
    
     <div class="col-md-12">
         <?php
            if($msg = $this->session->flashdata('success_msg')){
                echo '<div class="alert alert-success">'.$msg.'</div>';
            }
            if($msg = $this->session->flashdata('error_msg')){
                echo '<div class="alert alert-danger">'.$msg.'</div>';
            }
            
        ?>
        <div class="card">
            <div class="card-header bg-warning text-white">Monthly Payments</div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <select class="form-control select2" name="month" required>
                                <?php
                                $months = [
                                    '01' => 'January', '02' => 'February', '03' => 'March',
                                    '04' => 'April', '05' => 'May', '06' => 'June',
                                    '07' => 'July', '08' => 'August', '09' => 'September',
                                    '10' => 'October', '11' => 'November', '12' => 'December'
                                ];
                            
                                foreach ($months as $key => $m) {
                                    $selected = $key == $month ? 'selected' : '';
                                    echo "<option value='$key' $selected>$m</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <select class="form-control select2" name="year" required>
                                    <?php
                                    $currentYear = date('Y');
                                    $startYear = $currentYear - 10;
                                    $endYear = $currentYear + 10;
                                
                                    for ($y = $startYear; $y <= $endYear; $y++) {
                                        $selected = $year == $y ? 'selected' : '';
                                        echo "<option value='$y' $selected>$y</option>";
                                    }
                                    ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select class="form-control select2" name="property_id" required>
                                <?php 
                                    $get = $this->db->get_where('ab_property',['user_id'=>$this->session->id]);
                                    foreach($get->result() as $row){
                                        $selected = @$property_id == $row->id ? 'selected' : '';
                                        echo '<option value="'.$row->id.'" '.$selected.'>'.$row->name.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <button type="submit" name="action"  class="btn btn-sm btn-primary">Show</button>
                        </div>
                    </div>
                </form>
                <?php 
                    if(isset($_POST['property_id'])){
                        $propid = $_POST['property_id'];
                ?>
                <form method="POST" action="">
                    <input type="hidden" name="month" value="<?php echo $month; ?>">
                    <input type="hidden" name="year" value="<?php echo $year; ?>">
                    <div class="form-group col-md-12" style="text-align:right;">
                        <button type="submit" class="btn btn-sm btn-success mt-3" name="action" value="save-multiple-room-reading">Save</button>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Room</th>
                                <th>Reading</th>
                                <th>Extra Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php 
                    $rooms = $this->SiteModel->getRooms(['property_id'=>$propid]);
                    foreach($rooms->result() as $room){
                        $reading = $this->SiteModel->getMonthlyReading($room->id,$month,$year,'reading');
                        $extra_amount = $this->SiteModel->getMonthlyReading($room->id,$month,$year,'extra_amount');
                ?>
                        <tr>
                            <td>
                                <?php echo "$room->title ($room->room_no)"; ?>
                            </td>
                            <td>
                                <input type="number" min="0" name="data[<?php echo $room->id; ?>][reading]" placeholder="Enter reading" class="form-control" value="<?php echo $reading;?>" >
                            </td>
                            <td>
                                <input type="number"  name="data[<?php echo $room->id; ?>][extra_amount]" placeholder="Enter extra amount" class="form-control" value="<?php echo $extra_amount;?>">
                            </td>
                        </tr>
                <?php 
                    }
                ?>
                    </tbody>
                </table>
                    
                </form> 
                <?php 
                    }
                ?>
            </div>
        </div>
    </div>