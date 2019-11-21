@extends('layouts.app')
@section('content')
						<!-- Quick stats boxes -->
						<div class="row">
							<div class="col-lg-3">

								<!-- Members online -->
								<div class="card bg-teal-400">
									<div class="card-body">
										<div class="d-flex">
											<h3 class="font-weight-semibold mb-0">0</h3>
											<span class="badge bg-teal-800 badge-pill align-self-center ml-auto">+53,6%</span>
					                	</div>
					                	
					                	<div>
											Resep Baru
											<div class="font-size-sm opacity-75">489 avg</div>
										</div>
									</div>

									<div class="container-fluid">
										<div id="members-online"></div>
									</div>
								</div>
								<!-- /members online -->

							</div>

							<div class="col-lg-3">

								<!-- Current server load -->
								<div class="card bg-pink-400">
									<div class="card-body">
										<div class="d-flex">
											<h3 class="font-weight-semibold mb-0">0</h3>
											<div class="list-icons ml-auto">
						                		<div class="list-icons-item dropdown">
						                			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a href="#" class="dropdown-item"><i class="icon-sync"></i> Update data</a>
														<a href="#" class="dropdown-item"><i class="icon-list-unordered"></i> Detailed log</a>
														<a href="#" class="dropdown-item"><i class="icon-pie5"></i> Statistics</a>
														<a href="#" class="dropdown-item"><i class="icon-cross3"></i> Clear list</a>
													</div>
						                		</div>
					                		</div>
					                	</div>
					                	
					                	<div>
											Pasien Baru
											<div class="font-size-sm opacity-75">34.6% avg</div>
										</div>
									</div>

									<div id="server-load"></div>
								</div>
								<!-- /current server load -->

							</div>

							<div class="col-lg-3">

								<!-- Today's revenue -->
								<div class="card bg-blue-400">
									<div class="card-body">
										<div class="d-flex">
											<h3 class="font-weight-semibold mb-0">10</h3>
											<div class="list-icons ml-auto">
						                		<a class="list-icons-item" data-action="reload"></a>
						                	</div>
					                	</div>
					                	
					                	<div>
											Jumlah Pasien
											<div class="font-size-sm opacity-75">$37,578 avg</div>
										</div>
									</div>

									<div id="today-revenue"></div>
								</div>
								<!-- /today's revenue -->

                            </div>
                            
                            <div class="col-lg-3">

								<!-- Current server load -->
								<div class="card bg-violet-400">
									<div class="card-body">
										<div class="d-flex">
											<h3 class="font-weight-semibold mb-0">11</h3>
											<div class="list-icons ml-auto">
						                		<div class="list-icons-item dropdown">
						                			<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a href="#" class="dropdown-item"><i class="icon-sync"></i> Update data</a>
														<a href="#" class="dropdown-item"><i class="icon-list-unordered"></i> Detailed log</a>
														<a href="#" class="dropdown-item"><i class="icon-pie5"></i> Statistics</a>
														<a href="#" class="dropdown-item"><i class="icon-cross3"></i> Clear list</a>
													</div>
						                		</div>
					                		</div>
					                	</div>
					                	
					                	<div>
											Jumlah Obat
											<div class="font-size-sm opacity-75">34.6% avg</div>
										</div>
									</div>

									<div >

                                        <svg width="279.8000183105469" height="50"><g transform="translate(0,0)"><defs><clipPath id="load-clip-server-load"><rect class="load-clip" width="279.8000183105469" height="50"></rect></clipPath></defs><g clip-path="url(#load-clip-server-load)"><path d="M-10.761539165790264,33L-8.96794930482522,30.11111111111111C-7.174359443860176,27.22222222222222,-3.587179721930088,21.444444444444443,0,21.88888888888889C3.587179721930088,22.333333333333332,7.174359443860176,28.999999999999996,10.761539165790264,27.444444444444443C14.348718887720352,25.888888888888886,17.93589860965044,16.111111111111107,21.52307833158053,15.444444444444443C25.110258053510616,14.777777777777779,28.697437775440704,23.222222222222225,32.28461749737079,25.22222222222223C35.87179721930088,27.222222222222225,39.45897694123097,22.77777777777778,43.04615666316106,22.333333333333332C46.63333638509114,21.88888888888889,50.22051610702123,25.444444444444443,53.807695828951324,28.555555555555557C57.39487555088141,31.666666666666664,60.98205527281149,34.33333333333333,64.56923499474158,30.999999999999996C68.15641471667166,27.666666666666664,71.74359443860175,18.333333333333332,75.33077416053185,18.333333333333332C78.91795388246193,18.333333333333332,82.50513360439203,27.666666666666664,86.09231332632211,28.555555555555554C89.6794930482522,29.444444444444443,93.26667277018228,21.888888888888886,96.85385249211237,18.999999999999996C100.44103221404245,16.111111111111107,104.02821193597255,17.888888888888886,107.61539165790263,21.666666666666664C111.20257137983273,25.444444444444443,114.78975110176282,31.22222222222222,118.3769308236929,28.333333333333332C121.96411054562299,25.444444444444443,125.55129026755307,13.888888888888888,129.13846998948316,13.222222222222221C132.72564971141327,12.555555555555555,136.31282943334332,22.77777777777778,139.90000915527344,23C143.4871888772035,23.22222222222222,147.0743685991336,13.444444444444441,150.66154832106366,8.111111111111107C154.24872804299378,2.7777777777777737,157.83590776492383,1.888888888888885,161.42308748685394,1.6666666666666634C165.01026720878403,1.4444444444444422,168.5974469307141,1.888888888888888,172.18462665264423,6.111111111111111C175.7718063745743,10.333333333333332,179.3589860965044,18.333333333333332,182.9461658184345,22.777777777777775C186.53334554036456,27.22222222222222,190.12052526229465,28.111111111111107,193.70770498422473,29.444444444444443C197.29488470615482,30.77777777777778,200.8820644280849,32.55555555555556,204.469244150015,34.111111111111114C208.05642387194507,35.66666666666667,211.64360359387518,37,215.2307833158053,35.44444444444444C218.81796303773535,33.888888888888886,222.40514275966547,29.444444444444443,225.99232248159552,26.333333333333332C229.57950220352564,23.22222222222222,233.1666819254557,21.444444444444443,236.7538616473858,19.666666666666668C240.3410413693159,17.888888888888886,243.92822109124597,16.111111111111107,247.5154008131761,15.888888888888888C251.10258053510617,15.666666666666664,254.68976025703626,17,258.2769399789663,14.555555555555555C261.8641197008964,12.111111111111112,265.45129942282654,5.88888888888889,269.0384791447566,4.777777777777779C272.62565886668665,3.6666666666666665,276.21283858861676,7.666666666666665,279.8000183105469,13.222222222222221C283.38719803247693,18.777777777777775,286.97437775440704,25.88888888888889,290.56155747633716,25.444444444444443C294.1487371982672,25,297.73591692019727,17,299.5295067811623,13L301.3230966421274,9L301.3230966421274,50L299.52950678116235,49.999999999999986C297.73591692019727,49.99999999999999,294.1487371982672,49.99999999999999,290.5615574763371,49.999999999999986C286.97437775440704,49.99999999999999,283.38719803247693,49.99999999999999,279.8000183105469,49.999999999999986C276.21283858861676,49.99999999999999,272.62565886668665,49.99999999999999,269.0384791447566,49.999999999999986C265.45129942282654,49.99999999999999,261.8641197008964,49.99999999999999,258.2769399789663,49.999999999999986C254.68976025703626,49.99999999999999,251.10258053510617,49.99999999999999,247.5154008131761,49.999999999999986C243.92822109124597,49.99999999999999,240.3410413693159,49.99999999999999,236.7538616473858,49.999999999999986C233.1666819254557,49.99999999999999,229.57950220352564,49.99999999999999,225.99232248159552,49.999999999999986C222.40514275966547,49.99999999999999,218.81796303773535,49.99999999999999,215.2307833158053,49.999999999999986C211.64360359387518,49.99999999999999,208.05642387194507,49.99999999999999,204.469244150015,49.999999999999986C200.8820644280849,49.99999999999999,197.29488470615482,49.99999999999999,193.70770498422473,49.999999999999986C190.12052526229465,49.99999999999999,186.53334554036456,49.99999999999999,182.94616581843448,49.999999999999986C179.3589860965044,49.99999999999999,175.7718063745743,49.99999999999999,172.18462665264423,49.999999999999986C168.5974469307141,49.99999999999999,165.01026720878403,49.99999999999999,161.42308748685394,49.999999999999986C157.83590776492383,49.99999999999999,154.24872804299378,49.99999999999999,150.66154832106366,49.999999999999986C147.0743685991336,49.99999999999999,143.4871888772035,49.99999999999999,139.90000915527344,49.999999999999986C136.31282943334332,49.99999999999999,132.72564971141327,49.99999999999999,129.13846998948316,49.999999999999986C125.55129026755307,49.99999999999999,121.96411054562299,49.99999999999999,118.37693082369289,49.999999999999986C114.78975110176282,49.99999999999999,111.20257137983273,49.99999999999999,107.61539165790263,49.999999999999986C104.02821193597255,49.99999999999999,100.44103221404245,49.99999999999999,96.85385249211237,49.999999999999986C93.26667277018228,49.99999999999999,89.6794930482522,49.99999999999999,86.09231332632211,49.999999999999986C82.50513360439203,49.99999999999999,78.91795388246193,49.99999999999999,75.33077416053185,49.999999999999986C71.74359443860175,49.99999999999999,68.15641471667166,49.99999999999999,64.56923499474159,49.999999999999986C60.98205527281149,49.99999999999999,57.39487555088141,49.99999999999999,53.80769582895132,49.999999999999986C50.22051610702123,49.99999999999999,46.63333638509114,49.99999999999999,43.04615666316106,49.999999999999986C39.45897694123097,49.99999999999999,35.87179721930088,49.99999999999999,32.28461749737079,49.999999999999986C28.697437775440704,49.99999999999999,25.110258053510616,49.99999999999999,21.52307833158053,49.999999999999986C17.93589860965044,49.99999999999999,14.348718887720352,49.99999999999999,10.761539165790264,49.999999999999986C7.174359443860176,49.99999999999999,3.587179721930088,49.99999999999999,0,49.999999999999986C-3.587179721930088,49.99999999999999,-7.174359443860176,49.99999999999999,-8.96794930482522,49.999999999999986L-10.761539165790264,50Z" class="d3-area" style="fill: rgba(255, 255, 255, 0.5); opacity: 1;" transform="translate(-10.761539459228516,0)"></path></g></g></svg>
                                    </div>
								</div>
								<!-- /current server load -->

							</div>
						</div>
                        <!-- /quick stats boxes -->
                        
                        <div class="row">
                            <div class="col-xl-8">

                                <!-- Marketing campaigns -->
                                <div class="card">
                                    <div class="card-header header-elements-sm-inline">
                                        <h6 class="card-title">Marketing campaigns</h6>
                                        <div class="header-elements">
                                            <span class="badge bg-success badge-pill">28 active</span>
                                            <div class="list-icons ml-3">
                                                <div class="list-icons-item dropdown">
                                                    <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                    <div class="dropdown-menu">
                                                        <a href="#" class="dropdown-item"><i class="icon-sync"></i> Update data</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-list-unordered"></i> Detailed log</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-pie5"></i> Statistics</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item"><i class="icon-cross3"></i> Clear list</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        

        
                                    <div class="table-responsive">
                                        <table class="table text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Campaign</th>
                                                    <th>Client</th>
                                                    <th>Changes</th>
                                                    <th>Budget</th>
                                                    <th>Status</th>
                                                    <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="table-active table-border-double">
                                                    <td colspan="5">Today</td>
                                                    <td class="text-right">
                                                        <span class="progress-meter" id="today-progress" data-progress="30"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="mr-3">
                                                                <a href="#">
                                                                    <img src="../../../../global_assets/images/brands/facebook.png" class="rounded-circle" width="32" height="32" alt="">
                                                                </a>
                                                            </div>
                                                            <div>
                                                                <a href="#" class="text-default font-weight-semibold">Facebook</a>
                                                                <div class="text-muted font-size-sm">
                                                                    <span class="badge badge-mark border-blue mr-1"></span>
                                                                    02:00 - 03:00
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><span class="text-muted">Mintlime</span></td>
                                                    <td><span class="text-success-600"><i class="icon-stats-growth2 mr-2"></i> 2.43%</span></td>
                                                    <td><h6 class="font-weight-semibold mb-0">$5,489</h6></td>
                                                    <td><span class="badge bg-blue">Active</span></td>
                                                    <td class="text-center">
                                                        <div class="list-icons">
                                                            <div class="list-icons-item dropdown">
                                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
                                                                    <a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
                                                                    <a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="mr-3">
                                                                <a href="#">
                                                                    <img src="../../../../global_assets/images/brands/youtube.png" class="rounded-circle" width="32" height="32" alt="">
                                                                </a>
                                                            </div>
                                                            <div>
                                                                <a href="#" class="text-default font-weight-semibold">Youtube videos</a>
                                                                <div class="text-muted font-size-sm">
                                                                    <span class="badge badge-mark border-danger mr-1"></span>
                                                                    13:00 - 14:00
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><span class="text-muted">CDsoft</span></td>
                                                    <td><span class="text-success-600"><i class="icon-stats-growth2 mr-2"></i> 3.12%</span></td>
                                                    <td><h6 class="font-weight-semibold mb-0">$2,592</h6></td>
                                                    <td><span class="badge bg-danger">Closed</span></td>
                                                    <td class="text-center">
                                                        <div class="list-icons">
                                                            <div class="list-icons-item dropdown">
                                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
                                                                    <a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
                                                                    <a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="mr-3">
                                                                <a href="#">
                                                                    <img src="../../../../global_assets/images/brands/spotify.png" class="rounded-circle" width="32" height="32" alt="">
                                                                </a>
                                                            </div>
                                                            <div>
                                                                <a href="#" class="text-default font-weight-semibold">Spotify ads</a>
                                                                <div class="text-muted font-size-sm">
                                                                    <span class="badge badge-mark border-grey-400 mr-1"></span>
                                                                    10:00 - 11:00
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><span class="text-muted">Diligence</span></td>
                                                    <td><span class="text-danger"><i class="icon-stats-decline2 mr-2"></i> - 8.02%</span></td>
                                                    <td><h6 class="font-weight-semibold mb-0">$1,268</h6></td>
                                                    <td><span class="badge bg-grey-400">On hold</span></td>
                                                    <td class="text-center">
                                                        <div class="list-icons">
                                                            <div class="list-icons-item dropdown">
                                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
                                                                    <a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
                                                                    <a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="mr-3">
                                                                <a href="#">
                                                                    <img src="../../../../global_assets/images/brands/twitter.png" class="rounded-circle" width="32" height="32" alt="">
                                                                </a>
                                                            </div>
                                                            <div>
                                                                <a href="#" class="text-default font-weight-semibold">Twitter ads</a>
                                                                <div class="text-muted font-size-sm">
                                                                    <span class="badge badge-mark border-grey-400 mr-1"></span>
                                                                    04:00 - 05:00
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><span class="text-muted">Deluxe</span></td>
                                                    <td><span class="text-success-600"><i class="icon-stats-growth2 mr-2"></i> 2.78%</span></td>
                                                    <td><h6 class="font-weight-semibold mb-0">$7,467</h6></td>
                                                    <td><span class="badge bg-grey-400">On hold</span></td>
                                                    <td class="text-center">
                                                        <div class="list-icons">
                                                            <div class="list-icons-item dropdown">
                                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
                                                                    <a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
                                                                    <a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
        
                                                <tr class="table-active table-border-double">
                                                    <td colspan="5">Yesterday</td>
                                                    <td class="text-right">
                                                        <span class="progress-meter" id="yesterday-progress" data-progress="65"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="mr-3">
                                                                <a href="#">
                                                                    <img src="../../../../global_assets/images/brands/bing.png" class="rounded-circle" width="32" height="32" alt="">
                                                                </a>
                                                            </div>
                                                            <div>
                                                                <a href="#" class="text-default font-weight-semibold">Bing campaign</a>
                                                                <div class="text-muted font-size-sm">
                                                                    <span class="badge badge-mark border-success mr-1"></span>
                                                                    15:00 - 16:00
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><span class="text-muted">Metrics</span></td>
                                                    <td><span class="text-danger"><i class="icon-stats-decline2 mr-2"></i> - 5.78%</span></td>
                                                    <td><h6 class="font-weight-semibold mb-0">$970</h6></td>
                                                    <td><span class="badge bg-success-400">Pending</span></td>
                                                    <td class="text-center">
                                                        <div class="list-icons">
                                                            <div class="list-icons-item dropdown">
                                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
                                                                    <a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
                                                                    <a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="mr-3">
                                                                <a href="#">
                                                                    <img src="../../../../global_assets/images/brands/amazon.png" class="rounded-circle" width="32" height="32" alt="">
                                                                </a>
                                                            </div>
                                                            <div>
                                                                <a href="#" class="text-default font-weight-semibold">Amazon ads</a>
                                                                <div class="text-muted font-size-sm">
                                                                    <span class="badge badge-mark border-danger mr-1"></span>
                                                                    18:00 - 19:00
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><span class="text-muted">Blueish</span></td>
                                                    <td><span class="text-success-600"><i class="icon-stats-growth2 mr-2"></i> 6.79%</span></td>
                                                    <td><h6 class="font-weight-semibold mb-0">$1,540</h6></td>
                                                    <td><span class="badge bg-blue">Active</span></td>
                                                    <td class="text-center">
                                                        <div class="list-icons">
                                                            <div class="list-icons-item dropdown">
                                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
                                                                    <a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
                                                                    <a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="mr-3">
                                                                <a href="#">
                                                                    <img src="../../../../global_assets/images/brands/dribbble.png" class="rounded-circle" width="32" height="32" alt="">
                                                                </a>
                                                            </div>
                                                            <div>
                                                                <a href="#" class="text-default font-weight-semibold">Dribbble ads</a>
                                                                <div class="text-muted font-size-sm">
                                                                    <span class="badge badge-mark border-blue mr-1"></span>
                                                                    20:00 - 21:00
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><span class="text-muted">Teamable</span></td>
                                                    <td><span class="text-danger"><i class="icon-stats-decline2 mr-2"></i> 9.83%</span></td>
                                                    <td><h6 class="font-weight-semibold mb-0">$8,350</h6></td>
                                                    <td><span class="badge bg-danger">Closed</span></td>
                                                    <td class="text-center">
                                                        <div class="list-icons">
                                                            <div class="list-icons-item dropdown">
                                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> View statement</a>
                                                                    <a href="#" class="dropdown-item"><i class="icon-file-text2"></i> Edit campaign</a>
                                                                    <a href="#" class="dropdown-item"><i class="icon-file-locked"></i> Disable campaign</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a href="#" class="dropdown-item"><i class="icon-gear"></i> Settings</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /marketing campaigns -->
        
    
        
                            </div>
                        </div>
@endsection
