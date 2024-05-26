<aside id="leftsidebar" class="sidebar">
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="image"><a href="/admin"><img src="<?php echo base_url('theme/'); ?>assets/images/profile_av.jpg" alt="User"></a></div>
                    <div class="detail">
                        <h4><?=@$this->session->name;?></h4>
                        <small><?=@$this->session->type;?></small>                        
                    </div>
                    <!--<a href="events.html" title="Events"><i class="zmdi zmdi-calendar"></i></a>-->
                    <!--<a href="mail-inbox.html" title="Inbox"><i class="zmdi zmdi-email"></i></a>-->
                    <!--<a href="contact.html" title="Contact List"><i class="zmdi zmdi-account-box-phone"></i></a>-->
                    <!--<a href="chat.html" title="Chat App"><i class="zmdi zmdi-comments"></i></a>-->
                    <a href="<?=base_url('app/logout');?>" title="Sign out"><i class="zmdi zmdi-power"></i></a>
                </div>
            </li>
            <li class="header">MAIN</li>
            <li class="active open"><a href="/member"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>            
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Property</span> </a>
                <ul class="ml-menu">
                    <li><a href="<?php echo base_url('member/property'); ?>">Property List</a></li>
                    <li><a href="<?php echo base_url('member/property/add'); ?>">Add Property</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Rooms</span> </a>
                <ul class="ml-menu">
                    <li><a href="<?php echo base_url('member/room/add'); ?>">Add Rooms</a></li>
                    <li><a href="<?php echo base_url('member/room'); ?>">All Rooms</a></li>
                    
                </ul>
            </li><li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-accounts-outline"></i><span>Tenant</span> </a>
                <ul class="ml-menu">
                    <li><a href="<?php echo base_url('member/tenant/add'); ?>">Add Tenant</a></li>
                    <li><a href="<?php echo base_url('member/tenant'); ?>">All Tenant</a></li>                       
                </ul>
            </li>
            </li><li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-accounts-outline"></i><span>Monthly Report</span> </a>
                <ul class="ml-menu">
                    <li><a href="<?php echo base_url('member/monthly-report/property'); ?>">Monthly Report by property</a></li>
                    <li><a href="<?php echo base_url('member/monthly-report/room'); ?>">Monthly report by room</a></li>                       
                    <li><a href="<?php echo base_url('member/monthly-report/download-blank-sheet'); ?>">Download Blank Sheet</a></li>
                    <li><a href="<?php echo base_url('member/monthly-report/payment-collection'); ?>">Reading</a></li>
                </ul>
            </li>
            
            <li><a href="<?php echo base_url('member/complaint/tenant'); ?>"><i class="zmdi zmdi-pin"></i><span>Tenant Complaint</span></a></li>
            
            <?/*
            <li><a href="reports.html"><i class="zmdi zmdi-file-text"></i><span>Reports</span></a></li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>App</span> </a>
                <ul class="ml-menu">
                    <li><a href="mail-inbox.html">Inbox</a></li>
                    <li><a href="chat.html">Chat</a></li>
                    <li><a href="events.html">Calendar</a></li>
					<li><a href="file-dashboard.html">File Manager</a></li>
                    <li><a href="contact.html">Contact list</a></li>
                    <li><a href="blog-dashboard.html">Blog</a></li>
                </ul>
            </li>
            <li class="header">EXTRA COMPONENTS</li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-delicious"></i><span>Widgets</span> </a>
                <ul class="ml-menu">
                    <li><a href="widgets-app.html">Apps Widgetse</a></li>
                    <li><a href="widgets-data.html">Data Widgetse</a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-lock"></i><span>Authentication</span> </a>
                <ul class="ml-menu">
                    <li><a href="sign-in.html">Sign In</a> </li>
                    <li><a href="sign-up.html">Sign Up</a> </li>
                    <li><a href="forgot-password.html">Forgot Password</a> </li>
                    <li><a href="404.html">Page 404</a> </li>
                    <li><a href="500.html">Page 500</a> </li>
                    <li><a href="page-offline.html">Page Offline</a> </li>
                    <li><a href="locked.html">Locked Screen</a> </li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-copy"></i><span>Sample Pages</span> </a>
                <ul class="ml-menu">
                    <li><a href="blank.html">Blank Page</a> </li>
                    <li> <a href="image-gallery.html">Image Gallery</a> </li>
                    <li><a href="profile.html">Profile</a></li>
                    <li><a href="timeline.html">Timeline</a></li>
                    <li><a href="pricing.html">Pricing</a></li>
                    <li><a href="invoices.html">Invoices</a></li>
                    <li><a href="search-results.html">Search Results</a></li>
                </ul>
            </li>
            <li class="header">Extra</li>
            
            <li>
                <div class="progress-container progress-primary m-t-10">
                    <span class="progress-badge">Traffic this Month</span>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100" style="width: 67%;">
                            <span class="progress-value">67%</span>
                        </div>
                    </div>
                </div>
                <div class="progress-container progress-info">
                    <span class="progress-badge">Server Load</span>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width: 86%;">
                            <span class="progress-value">86%</span>
                        </div>
                    </div>
                </div>
            </li>
            */?>
        </ul>
    </div>
</aside>