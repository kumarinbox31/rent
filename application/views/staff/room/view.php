<?php 
$month = @$_POST['month'] ?? date('m');
$year = @$_POST['year'] ?? date('Y');

$room = $this->SiteModel->getRooms(['id'=>$this->uri->segment(4)]);
if($room->num_rows()){
    $room = $room->row();
    
    $image = base_url('uploads/room/').$room->image;
    if(!file_exists(FCPATH.'uploads/room/'.$room->image) || $room->image == ''){
        $image = base_url('theme/assets/images/image-gallery/1.jpg');
    }
    
    $totalCapicity = $room->capicity;
    $currentValue = $room->value_now;
    $per = $totalCapicity?round(($currentValue*100)/$totalCapicity):0;
    $prog = $per == 100 ? 'success' : 'danger';
    $prop = $this->SiteModel->getPropertyById($room->property_id)->row();
    $typeIcon = $room->type == 'room' ? 'home' : 'shopping-cart';
    
?>
<div class="row" style="margin-top:4rem;">
    
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <i class="fa fa-<?php echo $typeIcon; ?>"></i> <?php echo $room->title; ?>
                <a href="<?php echo base_url('member/room'); ?>" class="btn btn-sm btn-info" style="float:right;">Back</a>
            </div>
            <div class="card-body row">
                <div class="col-md-4">
                    <img src="<?php echo $image; ?>">
                </div>
                <div class="col-md-8">
                    <h5 class="text-success m-t-0 m-b-0"><i class="fa fa-inr"></i> <?=$room->price;?></h5>
                    <p><b>Room No: </b> <?=$room->room_no;?></p>
                    <div class="progress-container progress-primary m-t-10">
                            <div class="progress">
                                <div class="progress-bar progress-bar-<?=$prog?>" role="progressbar" aria-valuenow="<?=$currentValue?>" aria-valuemin="0" aria-valuemax="<?=$totalCapicity?>" style="width: 20%;">
                                </div>
                            </div>
                        </div>
                            
                    <p class="text-muted"><i class="zmdi zmdi-pin m-r-5"></i><?=@$prop->name;?></p>
                    <div class="property-action m-t-15">
                            <a href="#" title="Square Feet"><i class="zmdi zmdi-view-dashboard"></i><span> <?=$room->capicity?></span></a>
                            <a href="#" title="Garages"><i class="zmdi zmdi-home"></i><span> <?=$room->room_type;?></span></a>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-info text-white">Tenants</div>
            <div class="card-body">
                <table class="table table-bordered datatable">
                    <thead>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Age</th>
                        <th>Joining Date</th>
                        <th>Leaving Date</th>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                            $get = $this->SiteModel->getTenant(['room_id'=>$room->id]);
                            foreach($get->result() as $t){
                                $image = base_url('uploads/tenant/').$t->image;
                                if(file_exists(FCPATH.'uploads/tenant/'.$t->image) == false || $t->image == ''){
                                    $image = base_url('theme/assets/images/image-gallery/1.jpg');
                                }
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><img src="<?php echo $image; ?>" style="width:100px;"></td>
                            <td><?php echo $t->name; ?></td>
                            <td><?php echo $t->mobile; ?></td>
                            <td><?php echo $t->age; ?></td>
                            <td><?php echo date('d-m-Y',strtotime($t->joining_date)); ?></td>
                            <td><?php echo $t->leaving_date ? date('d-m-Y',strtotime($t->leaving_date)) : '<span style="color:green">Active</span>'; ?></td>
                            
                        </tr>
                        <?php 
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-warning text-white">Monthly Payments</div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <select class="form-control select2" name="month">
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
                            <select class="form-control select2" name="year">
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
                        <div class="form-group col-md-4">
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                <form method="POST" action="">
                    <input type="hidden" name="month" value="<?php echo $month; ?>">
                    <input type="hidden" name="year" value="<?php echo $year; ?>">
                    <input type="hidden" name="room_id" value="<?php echo $room->id; ?>">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Reading</label>
                            <input type="number" min="0" name="reading" placeholder="Enter reading" class="form-control" value="<?php echo $this->SiteModel->getMonthlyReading($room->id,$month,$year,'reading');?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Extra Amount</label>
                            <input type="number"  name="extra_amount" placeholder="Enter extra amount" class="form-control" value="<?php echo $this->SiteModel->getMonthlyReading($room->id,$month,$year,'extra_amount');?>">
                        </div>
                        <div class="form-group col-md-4" style="margin-top:1rem;" >
                            <button type="submit" class="btn btn-sm btn-success mt-3" name="action" value="save-monthly-reading">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>

<?php } ?>
