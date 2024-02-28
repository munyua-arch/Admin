<div class="left-side-bar">
			<div class="brand-logo">
			<a href="index.html">
					<!-- <img src="<?= base_url() ;?>/public/backend/vendors/images/satelite.png" alt="" class="img-fluid img-thumbnail "/>	 -->
					<h5 class="text-primary">Raha Internet</h5></p>
					
				</a>
				<div class="close-sidebar" data-toggle="left-sidebar-close">
					<i class="ion-close-round"></i>
				</div>	
			</div>
			<div class="menu-block customscroll">
				<div class="sidebar-menu">
					<ul id="accordion-menu">
						<li>
							<a href="<?= base_url().'dashboard/'?>" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-house"></span
								><span class="mtext">Home</span>
							</a>
						</li>
						<!-- forms -->
						<li class="dropdown">
							<a href="<?= base_url().'dashboard/users'?>" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-people"></span
								><span class="mtext">All Users</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="<?= base_url().'dashboard/subscriptions'?>" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-arrow-repeat"></span
								><span class="mtext">Subscriptions</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-broadcast-pin"></span
								><span class="mtext">IPS</span>
							</a>
							<ul class="submenu">
								<li><a href="<?= base_url().'dashboard/broadcasting'?>">Broadcasting IPS</a></li>
								<li><a href="<?= base_url().'dashboard/ptp'?>">PTP</a></li>
								
							</ul>
						</li>

						<!-- Bulk sms -->
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-envelope"></span
								><span class="mtext">Messaging</span>
							</a>
							<ul class="submenu">
								<li><a href="<?= base_url().'dashboard/single-message'?>">Single SMS</a></li>
								<li><a href="<?= base_url().'dashboard/group-message'?>">Group SMS</a></li>
								
							</ul>
						</li>

						<!-- settings -->
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-gear"></span
								><span class="mtext">Settings</span>
							</a>
							<ul class="submenu">
								<li><a href="<?= base_url().'dashboard/change-password'?>">Change Password</a></li>
								<li><a href="<?= base_url().'dashboard/edit-admin'?>">Edit Profile</a></li>		
							</ul>
						</li>
					
						<li class="dropdown">
							<a href="<?= base_url().'dashboard/support'?>" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-info-square"></span
								><span class="mtext">Support</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>