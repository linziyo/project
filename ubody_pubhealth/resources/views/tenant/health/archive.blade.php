<div class="box box-primary">
    <div class="box-header">
		<ul>
			@if($type == 'alcohol')
			<li>
				<div class="card">
					<div class="card-top">
						酒精浓度
					</div>
					<div class="report-data">
						<div class="query-form">
							<form class="form-inline">
								<div class="form-group examin_time">
									<label class="sr-only" for="alcohol_start_time">开始时间</label>
									<input type="text" class="form-control datepicker" id="alcohol_start_time" placeholder="开始时间">
								</div>
								<div class="form-group examin_time">
									<label class="sr-only" for="alcohol_end_time">结束时间</label>
									<input type="text" class="form-control datepicker" id="alcohol_end_time" placeholder="结束时间">
								</div>
								<button type="button" id="alcohol_submit" class="btn btn-info" style="width:70px;">查询</button>
								<button type="reset" id="alcohol_reset" class="btn btn-default" style="width:70px; float: right;">重置</button>
							</form>
						</div>

						<div class="data-chart">
							<div id="alcohol_chart" style="height: 375px; width:100%;" width="677" height="250"></div>
						</div>

						<div class="data-table">
							<table class="table table-bordered table-hover" id="alcohol_table">
								<thead>
								<tr>
									<th>测量时间</th>
									<th>酒精浓度值</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-bottom"></div>
				</div>
			</li>
			@endif

			@if($type == 'bloodFat')
			<li>
				<div class="card">
					<div class="card-top">
						血脂
					</div>
					<div class="report-data">
						<div class="query-form">
							<form class="form-inline">
								<div class="form-group examin_time">
									<label class="sr-only" for="bloodFat_start_time">开始时间</label>
									<input type="text" class="form-control datepicker" id="bloodFat_start_time" placeholder="开始时间">
								</div>
								<div class="form-group examin_time">
									<label class="sr-only" for="bloodFat_end_time">结束时间</label>
									<input type="text" class="form-control datepicker" id="bloodFat_end_time" placeholder="结束时间">
								</div>
								<button type="button" id="bloodFat_submit" class="btn btn-info" style="width:70px;">查询</button>
								<button type="reset" id="bloodFat_reset" class="btn btn-default" style="width:70px; float: right;">重置</button>
							</form>
						</div>

						<div class="data-chart">
							<div id="bloodFat_chart" style="height: 375px; width:100%;" width="677" height="250"></div>
						</div>

						<div class="data-table">
							<table class="table table-bordered table-hover" id="bloodFat_table">
								<thead>
								<tr>
									<th>测量时间</th>
									<th>总胆固醇</th>
									<th>高密度脂蛋白</th>
									<th>甘油三酯</th>
									<th>低密度脂蛋白</th>
									<th>血脂比值</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-bottom"></div>
				</div>
			</li>
			@endif

			@if($type == 'bloodOxygen')
			<li>
				<div class="card">
					<div class="card-top">
						血氧
					</div>
					<div class="report-data">
						<div class="query-form">
							<form class="form-inline">
								<div class="form-group examin_time">
									<label class="sr-only" for="bloodOxygen_start_time">开始时间</label>
									<input type="text" class="form-control datepicker" id="bloodOxygen_start_time" placeholder="开始时间">
								</div>
								<div class="form-group examin_time">
									<label class="sr-only" for="bloodOxygen_end_time">结束时间</label>
									<input type="text" class="form-control datepicker" id="bloodOxygen_end_time" placeholder="结束时间">
								</div>
								<button type="button" id="bloodOxygen_submit" class="btn btn-info" style="width:70px;">查询</button>
								<button type="reset" id="bloodOxygen_reset" class="btn btn-default" style="width:70px; float: right;">重置</button>
							</form>
						</div>

						<div class="data-chart">
							<div id="bloodOxygen_chart" style="height: 375px; width:100%;" width="677" height="250"></div>
						</div>

						<div class="data-table">
							<table class="table table-bordered table-hover" id="bloodOxygen_table">
								<thead>
								<tr>
									<th>测量时间</th>
									<th>血氧值</th>
									<th>血氧列表值</th>
									<th>脉率值</th>
									<th>脉率列表值</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-bottom"></div>
				</div>
			</li>
			@endif

			@if($type == 'bloodPressure')
			<li>
				<div class="card">
					<div class="card-top">
						血压
					</div>
					<div class="report-data">
						<div class="query-form">
							<form class="form-inline">
			  				<div class="form-group examin_time">
			    				<label class="sr-only" for="blood_pressure_start_time">开始时间</label>
									<input type="text" class="form-control datepicker" id="blood_pressure_start_time" placeholder="开始时间">
			  				</div>
							<div class="form-group examin_time">
								<label class="sr-only" for="blood_pressure_end_time">结束时间</label>
								<input type="text" class="form-control datepicker" id="blood_pressure_end_time" placeholder="结束时间">
							</div>
			  				<button type="button" id="blood_pressure_submit" class="btn btn-info" style="width:70px;">查询</button>
			  				<button type="reset" id="blood_pressure_reset" class="btn btn-default" style="width:70px; float: right;">重置</button>
							</form>
						</div>
			
						<div class="data-chart">
							<div id="blood_pressure_chart" style="height: 375px; width:100%;" width="677" height="250"></div>
						</div>
			
						<div class="data-table">
							<table class="table table-bordered table-hover" id="blood_pressure_table">
								<thead>
									<tr>
										<th>测量时间</th>
										<th>收缩压（mmHg）</th>
										<th>舒张压（mmHg）</th>
										<th>脉搏（bpm）</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-bottom"></div>
				</div>
			</li>
			@endif

			@if($type == 'bloodSugar')
			<li>
				<div class="card">
					<div class="card-top">
						血糖
					</div>
					<div class="report-data">
						<div class="query-form">
							<form class="form-inline">
								<div class="form-group examin_time">
									<label class="sr-only" for="bloodSugar_start_time">开始时间</label>
									<input type="text" class="form-control datepicker" id="bloodSugar_start_time" placeholder="开始时间">
								</div>
								<div class="form-group examin_time">
									<label class="sr-only" for="bloodSugar_end_time">结束时间</label>
									<input type="text" class="form-control datepicker" id="bloodSugar_end_time" placeholder="结束时间">
								</div>
								<button type="button" id="bloodSugar_submit" class="btn btn-info" style="width:70px;">查询</button>
								<button type="reset" id="bloodSugar_reset" class="btn btn-default" style="width:70px; float: right;">重置</button>
							</form>
						</div>

						<div class="data-chart">
							<div id="bloodSugar_chart" style="height: 375px; width:100%;" width="677" height="250"></div>
						</div>

						<div class="data-table">
							<table class="table table-bordered table-hover" id="bloodSugar_table">
								<thead>
								<tr>
									<th>测量时间</th>
									<th>空腹血糖</th>
									<th>餐后血糖</th>
									<th>随机血糖</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-bottom"></div>
				</div>
			</li>
			@endif

			@if($type == 'bMD')
			<li>
				<div class="card">
					<div class="card-top">
						骨密度
					</div>
					@if($data['bMD'][0]['health_analysis'] === false)
					<div class="card-middle text-success">正常</div>
					@else
					<div class="card-middle text-fail">非正常</div>
					@endif
					<div class="card-bottom">
						<span>T值:{{ $data['bMD'][0]['TSCORE'] }} </span>
						<span class="ml10">参考标准:>-1</span><br>
						<span>Z值:{{ $data['bMD'][0]['ZSCORE'] }} </span>
						<span class="ml10">参考标准:大于等于1</span><br>
						<span>骨质OI指数:{{ $data['bMD'][0]['OI'] }} </span>
						<span>骨质BQI指数:{{ $data['bMD'][0]['BQI'] }} </span><br>
						<span>超声声速:{{ $data['bMD'][0]['SOS'] }}(m/s) </span>
						<span>成人百分比:{{ $data['bMD'][0]['YOUNG_ADULT'] }} </span><br>
						<span>年龄百分比:{{ $data['bMD'][0]['AGE_MATCHED'] }} </span>
						<span>BUA:{{ $data['bMD'][0]['BUA'] }} </span><br>
						<span>预期发生骨质疏松的年龄:{{ $data['bMD'][0]['EOA'] }} </span>
						<span>相对骨折风险:{{ $data['bMD'][0]['RRF'] }} </span><br>
						<span>骨骼的生理年龄:{{ $data['bMD'][0]['PAB'] }} </span>
					</div>
				</div>
			</li>
			@endif

			@if($type == 'cardiovascular')
			<li>
				<div class="card">
					<div class="card-top">
						心血管功能
					</div>
					@if($data['cardiovascular'][0]['health_analysis'] === false)
						<div class="card-middle text-success">正常</div>
					@else
						<div class="card-middle text-fail">非正常</div>
					@endif
					<div class="card-bottom">
						<span>心脏功能:{{$data['cardiovascular'][0]['HeartFunction1']}} </span>
						<span class="ml10">心血管状况:{{$data['cardiovascular'][0]['VascularCondition1']}} </span><br>
						<span>心脏功能-简化数据:{{$data['cardiovascular'][0]['HeartFunction2']}} </span>
						<span class="ml10">心血管状况-简化数据:{{$data['cardiovascular'][0]['VascularCondition2']}} </span><br>
						<span>SV:{{$data['cardiovascular'][0]['SV']}} </span>
						<span class="ml10">CO:{{$data['cardiovascular'][0]['CO']}} </span><br>
						<span>HOV:{{$data['cardiovascular'][0]['HOV']}} </span>
						<span class="ml10">CMBV:{{$data['cardiovascular'][0]['CMBV']}} </span><br>
						<span>TPR:{{$data['cardiovascular'][0]['TPR']}} </span>
						<span class="ml10">PAWP:{{$data['cardiovascular'][0]['PAWP']}} </span><br>
						<span>N:{{$data['cardiovascular'][0]['N']}} </span>
					</div>
				</div>
			</li>
			@endif

			@if($type == 'chol')
			<li>
				<div class="card">
					<div class="card-top">
						总胆固醇
					</div>
					<div class="report-data">
						<div class="query-form">
							<form class="form-inline">
								<div class="form-group examin_time">
									<label class="sr-only" for="chol_start_time">开始时间</label>
									<input type="text" class="form-control datepicker" id="chol_start_time" placeholder="开始时间">
								</div>
								<div class="form-group examin_time">
									<label class="sr-only" for="chol_end_time">结束时间</label>
									<input type="text" class="form-control datepicker" id="chol_end_time" placeholder="结束时间">
								</div>
								<button type="button" id="chol_submit" class="btn btn-info" style="width:70px;">查询</button>
								<button type="reset" id="chol_reset" class="btn btn-default" style="width:70px; float: right;">重置</button>
							</form>
						</div>

						<div class="data-chart">
							<div id="chol_chart" style="height: 375px; width:100%;" width="677" height="250"></div>
						</div>

						<div class="data-table">
							<table class="table table-bordered table-hover" id="chol_table">
								<thead>
								<tr>
									<th>测量时间</th>
									<th>总胆固醇</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-bottom"></div>
				</div>
			</li>
			@endif

			@if($type == 'ecg')
			<li>
				<div class="card">
					<div class="card-top">
						远程心电
					</div>
					<div class="report-data">
						<div class="query-form">
							<form class="form-inline">
								<div class="form-group examin_time">
									<label class="sr-only" for="ecg_start_time">开始时间</label>
									<input type="text" class="form-control datepicker" id="ecg_start_time" placeholder="开始时间">
								</div>
								<div class="form-group examin_time">
									<label class="sr-only" for="ecg_end_time">结束时间</label>
									<input type="text" class="form-control datepicker" id="ecg_end_time" placeholder="结束时间">
								</div>
								<button type="button" id="ecg_submit" class="btn btn-info" style="width:70px;">查询</button>
								<button type="reset" id="ecg_reset" class="btn btn-default" style="width:70px; float: right;">重置</button>
							</form>
						</div>

						<div class="data-chart">
							<div id="ecg_chart" style="height: 375px; width:100%;" width="677" height="250"></div>
						</div>

						<div class="data-table">
							<table class="table table-bordered table-hover" id="ecg_table">
								<thead>
								<tr>
									<th>测量时间</th>
									<th>心率</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-bottom"></div>
				</div>
			</li>
			@endif

			@if($type == 'fat')
			<li>
				<div class="card">
					<div class="card-top">
						脂肪
					</div>
					<div class="report-data">
						<div class="query-form">
							<form class="form-inline">
								<div class="form-group examin_time">
									<label class="sr-only" for="fat_start_time">开始时间</label>
									<input type="text" class="form-control datepicker" id="fat_start_time" placeholder="开始时间">
								</div>
								<div class="form-group examin_time">
									<label class="sr-only" for="fat_end_time">结束时间</label>
									<input type="text" class="form-control datepicker" id="fat_end_time" placeholder="结束时间">
								</div>
								<button type="button" id="fat_submit" class="btn btn-info" style="width:70px;">查询</button>
								<button type="reset" id="fat_reset" class="btn btn-default" style="width:70px; float: right;">重置</button>
							</form>
						</div>

						<div class="data-chart">
							<div id="fat_chart" style="height: 375px; width:100%;" width="677" height="250"></div>
						</div>

						<div class="data-table">
							<table class="table table-bordered table-hover" id="fat_table">
								<thead>
								<tr>
									<th>测量时间</th>
									<th>体脂占比</th>
									<th>基础代谢</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-bottom"></div>
				</div>
			</li>
			@endif

			@if($type == 'hb')
			<li>
				<div class="card">
					<div class="card-top">
						血红蛋白
					</div>
					<div class="report-data">
						<div class="query-form">
							<form class="form-inline">
								<div class="form-group examin_time">
									<label class="sr-only" for="hb_start_time">开始时间</label>
									<input type="text" class="form-control datepicker" id="hb_start_time" placeholder="开始时间">
								</div>
								<div class="form-group examin_time">
									<label class="sr-only" for="hb_end_time">结束时间</label>
									<input type="text" class="form-control datepicker" id="hb_end_time" placeholder="结束时间">
								</div>
								<button type="button" id="hb_submit" class="btn btn-info" style="width:70px;">查询</button>
								<button type="reset" id="hb_reset" class="btn btn-default" style="width:70px; float: right;">重置</button>
							</form>
						</div>

						<div class="data-chart">
							<div id="hb_chart" style="height: 375px; width:100%;" width="677" height="250"></div>
						</div>

						<div class="data-table">
							<table class="table table-bordered table-hover" id="hb_table">
								<thead>
								<tr>
									<th>测量时间</th>
									<th>血红蛋白值</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-bottom"></div>
				</div>
			</li>
			@endif

			@if($type == 'height')
			<li>
				<div class="card">
					<div class="card-top">
						身高体重
					</div>
					<div class="report-data">
						<div class="query-form">
							<form class="form-inline">
								<div class="form-group examin_time">
									<label class="sr-only" for="height_start_time">开始时间</label>
									<input type="text" class="form-control datepicker" id="height_start_time" placeholder="开始时间">
								</div>
								<div class="form-group examin_time">
									<label class="sr-only" for="height_end_time">结束时间</label>
									<input type="text" class="form-control datepicker" id="height_end_time" placeholder="结束时间">
								</div>
								<button type="button" id="height_submit" class="btn btn-info" style="width:70px;">查询</button>
								<button type="reset" id="height_reset" class="btn btn-default" style="width:70px; float: right;">重置</button>
							</form>
						</div>

						<div class="data-chart">
							<div id="height_chart" style="height: 375px; width:100%;" width="677" height="250"></div>
						</div>

						<div class="data-table">
							<table class="table table-bordered table-hover" id="height_table">
								<thead>
								<tr>
									<th>测量时间</th>
									<th>身高值</th>
									<th>体重值</th>
									<th>BMI值</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-bottom"></div>
				</div>
			</li>
			@endif

			@if($type == 'lung')
			<li>
				<div class="card">
					<div class="card-top">
						肺活量
					</div>
					<div class="report-data">
						<div class="query-form">
							<form class="form-inline">
								<div class="form-group examin_time">
									<label class="sr-only" for="lung_start_time">开始时间</label>
									<input type="text" class="form-control datepicker" id="lung_start_time" placeholder="开始时间">
								</div>
								<div class="form-group examin_time">
									<label class="sr-only" for="lung_end_time">结束时间</label>
									<input type="text" class="form-control datepicker" id="lung_end_time" placeholder="结束时间">
								</div>
								<button type="button" id="lung_submit" class="btn btn-info" style="width:70px;">查询</button>
								<button type="reset" id="lung_reset" class="btn btn-default" style="width:70px; float: right;">重置</button>
							</form>
						</div>

						<div class="data-chart">
							<div id="lung_chart" style="height: 375px; width:100%;" width="677" height="250"></div>
						</div>

						<div class="data-table">
							<table class="table table-bordered table-hover" id="lung_table">
								<thead>
								<tr>
									<th>测量时间</th>
									<th>肺活量</th>
									<th>用力肺活量</th>
									<th>用力呼气1秒量</th>
									<th>25% 肺活量时的用力呼气流速</th>
									<th>75% 肺活量时的用力呼气流速</th>
									<th>25% 肺活量到75%肺活量之间的平均呼气流速</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-bottom"></div>
				</div>
			</li>
			@endif

			@if($type == 'minFat')
			<li>
				<div class="card">
					<div class="card-top">
						人体成分(脂肪)
					</div>
					<div class="report-data">
						<div class="query-form">
							<form class="form-inline">
								<div class="form-group examin_time">
									<label class="sr-only" for="minFat_start_time">开始时间</label>
									<input type="text" class="form-control datepicker" id="minFat_start_time" placeholder="开始时间">
								</div>
								<div class="form-group examin_time">
									<label class="sr-only" for="minFat_end_time">结束时间</label>
									<input type="text" class="form-control datepicker" id="minFat_end_time" placeholder="结束时间">
								</div>
								<button type="button" id="minFat_submit" class="btn btn-info" style="width:70px;">查询</button>
								<button type="reset" id="minFat_reset" class="btn btn-default" style="width:70px; float: right;">重置</button>
							</form>
						</div>

						<div class="data-chart">
							<div id="minFat_chart" style="height: 375px; width:100%;" width="677" height="250"></div>
						</div>

						<div class="data-table">
							<table class="table table-bordered table-hover" id="minFat_table">
								<thead>
								<tr>
									<th>测量时间</th>
									<th>体型</th>
									<th>体质指数</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-bottom"></div>
				</div>
			</li>
			@endif

			@if($type == 'pEEcg')
			<li>
				<div class="card">
					<div class="card-top">
						12导心电
					</div>
					@if($data['pEEcg'][0]['health_analysis'] === false)
						<div class="card-middle text-success">正常</div>
					@else
						<div class="card-middle text-fail">非正常</div>
					@endif
					<div class="card-bottom">
						<span>心率值:{{ $data['pEEcg'][0]['Hr'] }}次/分 </span>
						<span>P 轴:{{ $data['pEEcg'][0]['PAxis'] }} </span><br>
						<span>QRS 轴:{{ $data['pEEcg'][0]['QRSAxis'] }}次/分 </span>
						<span>T 轴:{{ $data['pEEcg'][0]['TAxis'] }} </span><br>
						<span>PR 间期:{{ $data['pEEcg'][0]['PR'] }} </span>
						<span>QRS 时限:{{ $data['pEEcg'][0]['QRS'] }} </span><br>
						<span>QT 间期:{{ $data['pEEcg'][0]['QT'] }} </span>
						<span>QTc 间期:{{ $data['pEEcg'][0]['QTc'] }} </span><br>
						<span>RV5 幅度:{{ $data['pEEcg'][0]['RV5'] }} </span>
						<span>SV1 幅度:{{ $data['pEEcg'][0]['SV1'] }} </span><br>
						<span>心电图数据:{{ $data['pEEcg'][0]['EcgData'] }} </span>
					</div>
				</div>
			</li>
			@endif

			@if($type == 'temperature')
			<li>
				<div class="card">
					<div class="card-top">
						体温
					</div>
					<div class="report-data">
						<div class="query-form">
							<form class="form-inline">
								<div class="form-group examin_time">
									<label class="sr-only" for="temperature_start_time">开始时间</label>
									<input type="text" class="form-control datepicker" id="temperature_start_time" placeholder="开始时间">
								</div>
								<div class="form-group examin_time">
									<label class="sr-only" for="temperature_end_time">结束时间</label>
									<input type="text" class="form-control datepicker" id="temperature_end_time" placeholder="结束时间">
								</div>
								<button type="button" id="temperature_submit" class="btn btn-info" style="width:70px;">查询</button>
								<button type="reset" id="temperature_reset" class="btn btn-default" style="width:70px; float: right;">重置</button>
							</form>
						</div>

						<div class="data-chart">
							<div id="temperature_chart" style="height: 375px; width:100%;" width="677" height="250"></div>
						</div>

						<div class="data-table">
							<table class="table table-bordered table-hover" id="temperature_table">
								<thead>
								<tr>
									<th>测量时间</th>
									<th>体温值</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-bottom"></div>
				</div>
			</li>
			@endif

			@if($type == 'uricAcid')
			<li>
				<div class="card">
					<div class="card-top">
						血尿酸
					</div>
					<div class="report-data">
						<div class="query-form">
							<form class="form-inline">
								<div class="form-group examin_time">
									<label class="sr-only" for="uricAcid_start_time">开始时间</label>
									<input type="text" class="form-control datepicker" id="uricAcid_start_time" placeholder="开始时间">
								</div>
								<div class="form-group examin_time">
									<label class="sr-only" for="uricAcid_end_time">结束时间</label>
									<input type="text" class="form-control datepicker" id="uricAcid_end_time" placeholder="结束时间">
								</div>
								<button type="button" id="uricAcid_submit" class="btn btn-info" style="width:70px;">查询</button>
								<button type="reset" id="uricAcid_reset" class="btn btn-default" style="width:70px; float: right;">重置</button>
							</form>
						</div>

						<div class="data-chart">
							<div id="uricAcid_chart" style="height: 375px; width:100%;" width="677" height="250"></div>
						</div>

						<div class="data-table">
							<table class="table table-bordered table-hover" id="uricAcid_table">
								<thead>
								<tr>
									<th>测量时间</th>
									<th>尿酸值</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-bottom"></div>
				</div>
			</li>
			@endif

			@if($type == 'urinalysis')
			<li>
				<div class="card">
					<div class="card-top">
						尿液分析
					</div>
					@if($data['urinalysis'][0]['health_analysis'] === false)
						<div class="card-middle text-success">正常</div>
					@else
						<div class="card-middle text-fail">非正常</div>
					@endif
					<div class="card-bottom">
						<span>尿胆原:{{ $data['urinalysis'][0]['URO'] }} </span>
						<span>潜血:{{ $data['urinalysis'][0]['BLD'] }} </span><br>
						<span>胆红素:{{ $data['urinalysis'][0]['BIL'] }} </span>
						<span>酮体:{{ $data['urinalysis'][0]['KET'] }} </span><br>
						<span>白细胞:{{ $data['urinalysis'][0]['LEU'] }} </span>
						<span>葡萄糖:{{ $data['urinalysis'][0]['GLU'] }} </span><br>
						<span>蛋白质:{{ $data['urinalysis'][0]['PRO'] }} </span>
						<span>酸碱度:{{ $data['urinalysis'][0]['PH'] }} </span><br>
						<span>亚硝酸盐:{{ $data['urinalysis'][0]['NIT'] }} </span>
						<span>比重:{{ $data['urinalysis'][0]['SG'] }} </span><br>
						<span>维生素:{{ $data['urinalysis'][0]['VC'] }} </span>
						<span>微白蛋白:{{ $data['urinalysis'][0]['MAL'] }} </span><br>
						<span>肌酐:{{ $data['urinalysis'][0]['CR'] }} </span>
						<span>钙离子:{{ $data['urinalysis'][0]['UCA'] }} </span><br>
					</div>
				</div>
			</li>
			@endif

			@if($type == 'whr')
			<li>
				<div class="card">
					<div class="card-top">
						腰臀比
					</div>
					<div class="report-data">
						<div class="query-form">
							<form class="form-inline">
								<div class="form-group examin_time">
									<label class="sr-only" for="whr_start_time">开始时间</label>
									<input type="text" class="form-control datepicker" id="whr_start_time" placeholder="开始时间">
								</div>
								<div class="form-group examin_time">
									<label class="sr-only" for="whr_end_time">结束时间</label>
									<input type="text" class="form-control datepicker" id="whr_end_time" placeholder="结束时间">
								</div>
								<button type="button" id="whr_submit" class="btn btn-info" style="width:70px;">查询</button>
								<button type="reset" id="whr_reset" class="btn btn-default" style="width:70px; float: right;">重置</button>
							</form>
						</div>

						<div class="data-chart">
							<div id="whr_chart" style="height: 375px; width:100%;" width="677" height="250"></div>
						</div>

						<div class="data-table">
							<table class="table table-bordered table-hover" id="whr_table">
								<thead>
								<tr>
									<th>测量时间</th>
									<th>腰围</th>
									<th>臀围</th>
									<th>腰臀比</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-bottom"></div>
				</div>
			</li>
			@endif
		</ul>
    </div>
   <div class="box-body">
    	<button type="button" class="btn btn-primary" data-dismiss="modal" style="float:right">关闭</button>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/echarts.min.js') }}"></script>
<script type="text/javascript">
    $(function(){
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            language: 'zh-CN'
        });
    });
</script>
@if($type == 'alcohol')
	<script type="text/javascript">
        var alcohol = echarts.init(document.getElementById('alcohol_chart'));
        alcohol_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['酒精浓度值']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'酒精浓度值',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        alcohol.setOption(alcohol_data);
	</script>
	<script type="text/javascript">
        $(function(){
            $('#alcohol_submit').click(function(){
                var alcohol_start_time = $('#alcohol_start_time').val();
                var alcohol_end_time   = $('#alcohol_end_time').val();
                var getData = {'startTime':alcohol_start_time,'endTime':alcohol_end_time,'asynchronous':1};
                get_chart_list(getData);
                return false;
            });
            var getData = {'asynchronous':1};
            get_chart_list(getData);
        });

        function get_chart_list(getData){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$code,'HealthType'=>'alcohol']) }}",getData,function(data){
                var alcohol_key = new Array();
                var alcohol_value = new Array();
                if(data){
                    var html = '';
                    for(var i=0;i<data.length;i++){
                        alcohol_key.push(data[i].MeasureTime);
                        alcohol_value.push(data[i].Alcohol);
                        html += '<tr><td>'+data[i].MeasureTime+'</td><td>'+data[i].Alcohol+'</td></tr>';
                    }
                }
                alcohol_data.xAxis.data = alcohol_key;
                alcohol_data.series[0].data = alcohol_value;
                alcohol.setOption(alcohol_data);
                $('#blood_pressure_table').find('tbody').html(html);
            });
        }
	</script>
@endif
@if($type == 'bloodFat')
	<script type="text/javascript">
        var bloodFat = echarts.init(document.getElementById('bloodFat_chart'));
        bloodFat_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['总胆固醇','高密度脂蛋白','甘油三酯','低密度脂蛋白','血脂比值']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'总胆固醇',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'高密度脂蛋白',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'甘油三酯',
                    type:'line',

                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'低密度脂蛋白',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'血脂比值',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        bloodFat.setOption(bloodFat_data);
	</script>
	<script type="text/javascript">
        $(function(){
            $('#bloodFat_submit').click(function(){
                var bloodFat_start_time = $('#bloodFat_start_time').val();
                var bloodFat_end_time   = $('#bloodFat_end_time').val();
                var getData = {'startTime':bloodFat_start_time,'endTime':bloodFat_end_time,'asynchronous':1};
                get_chart_list(getData);
                return false;
            });
            var getData = {'asynchronous':1};
            get_chart_list(getData);
        });

        function get_chart_list(getData){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$code,'HealthType'=>'bloodFat']) }}",getData,function(data){
                var bloodFat_key = new Array();
                var bloodFat_TChol = new Array();
                var bloodFat_HdlChol = new Array();
                var bloodFat_Trig = new Array();
                var bloodFat_CalcLdl = new Array();
                var bloodFat_TcHdl = new Array();
                if(data){
                    var html = '';
                    for(var i=0;i<data.length;i++){
                        bloodFat_key.push(data[i].MeasureTime);
                        bloodFat_TChol.push(data[i].TChol);
                        bloodFat_HdlChol.push(data[i].HdlChol);
                        bloodFat_Trig.push(data[i].Trig);
                        bloodFat_CalcLdl.push(data[i].CalcLdl);
                        bloodFat_TcHdl.push(data[i].TcHdl);
                        html += '<tr><td>'+data[i].MeasureTime+'</td><td>'+data[i].TChol+'</td><td>'+data[i].HdlChol+'</td><td>'+data[i].Trig+'</td><td>'+data[i].CalcLdl+'</td><td>'+data[i].TcHdl+'</td></tr>';
                    }
                }
                bloodFat_data.xAxis.data = bloodFat_key;
                bloodFat_data.series[0].data = bloodFat_TChol;
                bloodFat_data.series[1].data = bloodFat_HdlChol;
                bloodFat_data.series[2].data = bloodFat_Trig;
                bloodFat_data.series[3].data = bloodFat_CalcLdl;
                bloodFat_data.series[4].data = bloodFat_TcHdl;
                bloodFat.setOption(bloodFat_data);
                $('#bloodFat_table').find('tbody').html(html);
            });
        }
	</script>
@endif
@if($type == 'bloodOxygen')
	<script type="text/javascript">
        var bloodOxygen = echarts.init(document.getElementById('bloodOxygen_chart'));
        bloodOxygen_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['血氧值','血氧列表值','脉率值','脉率列表值']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'血氧值',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'血氧列表值',
                    type:'line',
                    data:[0]
                },
                {
                    name:'脉率值',
                    type:'line',
                    data:[0]
                },
                {
                    name:'脉率列表值',
                    type:'line',
                    data:[0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        bloodOxygen.setOption(bloodOxygen_data);
	</script>
	<script type="text/javascript">
        $(function(){
            $('#bloodOxygen_submit').click(function(){
                var bloodOxygen_start_time = $('#bloodOxygen_start_time').val();
                var bloodOxygen_end_time   = $('#bloodOxygen_end_time').val();
                var getData = {'startTime':bloodOxygen_start_time,'endTime':bloodOxygen_end_time,'asynchronous':1};
                get_chart_list(getData);
                return false;
            });
            var getData = {'asynchronous':1};
            get_chart_list(getData);
        });

        function get_chart_list(getData){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$code,'HealthType'=>'bloodOxygen']) }}",getData,function(data){
                var bloodOxygen_key = new Array();
                var bloodOxygen_Oxygen = new Array();
                var bloodOxygen_OxygenList = new Array();
                var bloodOxygen_Bpm = new Array();
                var bloodOxygen_BpmList = new Array();
                if(data){
                    var html = '';
                    for(var i=0;i<data.length;i++){
                        bloodOxygen_key.push(data[i].MeasureTime);
                        bloodOxygen_Oxygen.push(data[i].Oxygen);
                        bloodOxygen_OxygenList.push(data[i].OxygenList);
                        bloodOxygen_Bpm.push(data[i].Bpm);
                        bloodOxygen_BpmList.push(data[i].BpmList);
                        html += '<tr><td>'+data[i].MeasureTime+'</td><td>'+data[i].Oxygen+'</td><td>'+data[i].OxygenList+'</td><td>'+data[i].Bpm+'</td><td>'+data[i].BpmList+'</td></tr>';
                    }
                }
                bloodOxygen_data.xAxis.data = bloodOxygen_key;
                bloodOxygen_data.series[0].data = bloodOxygen_Oxygen;
                bloodOxygen_data.series[1].data = bloodOxygen_OxygenList;
                bloodOxygen_data.series[2].data = bloodOxygen_Bpm;
                bloodOxygen_data.series[3].data = bloodOxygen_BpmList;
                bloodOxygen.setOption(bloodOxygen_data);
                $('#bloodOxygen_table').find('tbody').html(html);
            });
        }
	</script>
@endif

@if($type == 'bloodPressure')
<script type="text/javascript">
	var blood_pressure = echarts.init(document.getElementById('blood_pressure_chart'));
    blood_pressure_data = {
			tooltip: {
				trigger: 'axis'
			},
			legend: {
				data:['收缩压','舒张压','脉搏']
			},
			grid: {
				left: '3%',
				right: '4%',
				bottom: '3%',
				containLabel: true
			},
			toolbox: {
				feature: {
					saveAsImage: {}
				}
			},
			xAxis: {
				type: 'category',
				boundaryGap: false,
				data: ['1','2','3','4','5','6','7']
			},
			yAxis: {
				type: 'value'
			},
			series: [
				{
					name:'收缩压',
					type:'line',
					data:[0, 0, 0, 0, 0, 0, 0]
				},
				{
					name:'舒张压',
					type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
				},
                {
                    name:'脉搏',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
			]
		};
	 // 使用刚指定的配置项和数据显示图表。
    blood_pressure.setOption(blood_pressure_data);
</script>
<script type="text/javascript">
	$(function(){
		$('#blood_pressure_submit').click(function(){
            var blood_pressure_start_time = $('#blood_pressure_start_time').val();
            var blood_pressure_end_time   = $('#blood_pressure_end_time').val();
            var getData = {'startTime':blood_pressure_start_time,'endTime':blood_pressure_end_time,'asynchronous':1};
		    get_chart_list(getData);
            return false;
		});
        var getData = {'asynchronous':1};
        get_chart_list(getData);
	});

	function get_chart_list(getData){
        $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$code,'HealthType'=>'bloodPressure']) }}",getData,function(data){
            var blood_pressure_key = new Array();
            var blood_pressure_high = new Array();
            var blood_pressure_low = new Array();
            var blood_pressure_pulse = new Array();
            if(data){
                var html = '';
                for(var i=0;i<data.length;i++){
                    blood_pressure_key.push(data[i].MeasureTime);
                    blood_pressure_high.push(data[i].HighPressure);
                    blood_pressure_low.push(data[i].LowPressure);
                    blood_pressure_pulse.push(data[i].Pulse);
                    html += '<tr><td>'+data[i].MeasureTime+'</td><td>'+data[i].HighPressure+'</td><td>'+data[i].LowPressure+'</td><td>'+data[i].Pulse+'</td></tr>';
                }
            }
            blood_pressure_data.xAxis.data = blood_pressure_key;
            blood_pressure_data.series[0].data = blood_pressure_high;
            blood_pressure_data.series[1].data = blood_pressure_low;
            blood_pressure_data.series[2].data = blood_pressure_pulse;
            blood_pressure.setOption(blood_pressure_data);
            $('#blood_pressure_table').find('tbody').html(html);
        });
	}
</script>
@endif

@if($type == 'bloodSugar')
	<script type="text/javascript">
        var bloodSugar = echarts.init(document.getElementById('bloodSugar_chart'));
        bloodSugar_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['空腹血糖','餐后血糖','随机血糖']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'空腹血糖',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'餐后血糖',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'随机血糖',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        bloodSugar.setOption(bloodSugar_data);
	</script>
	<script type="text/javascript">
        $(function(){
            $('#bloodSugar_submit').click(function(){
                var bloodSugar_start_time = $('#bloodSugar_start_time').val();
                var bloodSugar_end_time   = $('#bloodSugar_end_time').val();
                var getData = {'startTime':bloodSugar_start_time,'endTime':bloodSugar_end_time,'asynchronous':1};
                get_chart_list(getData);
                return false;
            });
            var getData = {'asynchronous':1};
            get_chart_list(getData);
        });

        function get_chart_list(getData){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$code,'HealthType'=>'bloodSugar']) }}",getData,function(data){
                var bloodSugar_key = new Array();
                var bloodSugar_BloodSugar_1 = new Array();
                var bloodSugar_BloodSugar_2 = new Array();
                var bloodSugar_BloodSugar_3 = new Array();
                if(data){
                    var html = '';
                    for(var i=0;i<data.length;i++){
                        var BloodSugar_1 = 0;
                        var BloodSugar_2 = 0;
                        var BloodSugar_3 = 0;
                        if(data[i].BloodsugarType == 1){
                            BloodSugar_1 = data[i].BloodSugar;
                            bloodSugar_BloodSugar_1.push(BloodSugar_1);
                        }else if(data[i].BloodsugarType == 2) {
                            BloodSugar_2 = data[i].BloodSugar;
                            bloodSugar_BloodSugar_2.push(BloodSugar_2);
                        }else{
                            BloodSugar_3 = data[i].BloodSugar;
                            bloodSugar_BloodSugar_3.push(BloodSugar_3);
                        }
                        bloodSugar_key.push(data[i].MeasureTime);
                        html += '<tr><td>'+data[i].MeasureTime+'</td><td>'+BloodSugar_1+'</td><td>'+BloodSugar_2+'</td><td>'+BloodSugar_3+'</td></tr>';
                    }
                }
                bloodSugar_data.xAxis.data = bloodSugar_key;
                bloodSugar_data.series[0].data = bloodSugar_BloodSugar_1;
                bloodSugar_data.series[1].data = bloodSugar_BloodSugar_2;
                bloodSugar_data.series[2].data = bloodSugar_BloodSugar_3;
                bloodSugar.setOption(bloodSugar_data);
                $('#bloodSugar_table').find('tbody').html(html);
            });
        }
	</script>
@endif
@if($type == 'chol')
	<script type="text/javascript">
        var chol = echarts.init(document.getElementById('chol_chart'));
        chol_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['总胆固醇值']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'总胆固醇值',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        chol.setOption(chol_data);
	</script>
	<script type="text/javascript">
        $(function(){
            $('#chol_submit').click(function(){
                var chol_start_time = $('#chol_start_time').val();
                var chol_end_time   = $('#chol_end_time').val();
                var getData = {'startTime':chol_start_time,'endTime':chol_end_time,'asynchronous':1};
                get_chart_list(getData);
                return false;
            });
            var getData = {'asynchronous':1};
            get_chart_list(getData);
        });

        function get_chart_list(getData){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$code,'HealthType'=>'chol']) }}",getData,function(data){
                var chol_key = new Array();
                var chol_value = new Array();
                if(data){
                    var html = '';
                    for(var i=0;i<data.length;i++){
                        chol_key.push(data[i].MeasureTime);
                        chol_value.push(data[i].Chol);
                        html += '<tr><td>'+data[i].MeasureTime+'</td><td>'+data[i].Chol+'</td></tr>';
                    }
                }
                chol_data.xAxis.data = chol_key;
                chol_data.series[0].data = chol_value;
                chol.setOption(chol_data);
                $('#chol_table').find('tbody').html(html);
            });
        }
	</script>
@endif
@if($type == 'ecg')
	<script type="text/javascript">
        var ecg = echarts.init(document.getElementById('ecg_chart'));
        ecg_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['心率']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'心率',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        ecg.setOption(ecg_data);
	</script>
	<script type="text/javascript">
        $(function(){
            $('#ecg_submit').click(function(){
                var ecg_start_time = $('#ecg_start_time').val();
                var ecg_end_time   = $('#ecg_end_time').val();
                var getData = {'startTime':ecg_start_time,'endTime':ecg_end_time,'asynchronous':1};
                get_chart_list(getData);
                return false;
            });
            var getData = {'asynchronous':1};
            get_chart_list(getData);
        });

        function get_chart_list(getData){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$code,'HealthType'=>'ecg']) }}",getData,function(data){
                var ecg_key = new Array();
                var ecg_value = new Array();
                if(data){
                    var html = '';
                    for(var i=0;i<data.length;i++){
                        ecg_key.push(data[i].MeasureTime);
                        ecg_value.push(data[i].Hr);
                        html += '<tr><td>'+data[i].MeasureTime+'</td><td>'+data[i].Hr+'</td></tr>';
                    }
                }
                ecg_data.xAxis.data = ecg_key;
                ecg_data.series[0].data = ecg_value;
                ecg.setOption(ecg_data);
                $('#ecg_table').find('tbody').html(html);
            });
        }
	</script>
@endif
@if($type == 'fat')
	<script type="text/javascript">
        var fat = echarts.init(document.getElementById('fat_chart'));
        fat_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['体脂占比','基础代谢']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'体脂占比',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'基础代谢',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        fat.setOption(fat_data);
	</script>
	<script type="text/javascript">
        $(function(){
            $('#fat_submit').click(function(){
                var fat_start_time = $('#fat_start_time').val();
                var fat_end_time   = $('#fat_end_time').val();
                var getData = {'startTime':fat_start_time,'endTime':fat_end_time,'asynchronous':1};
                get_chart_list(getData);
                return false;
            });
            var getData = {'asynchronous':1};
            get_chart_list(getData);
        });

        function get_chart_list(getData){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$code,'HealthType'=>'fat']) }}",getData,function(data){
                var fat_key = new Array();
                var fat_FatRate = new Array();
                var fat_BasicMetabolism = new Array();
                if(data){
                    var html = '';
                    for(var i=0;i<data.length;i++){
                        fat_key.push(data[i].MeasureTime);
                        fat_FatRate.push(data[i].FatRate);
                        fat_BasicMetabolism.push(data[i].BasicMetabolism);
                        html += '<tr><td>'+data[i].MeasureTime+'</td><td>'+data[i].FatRate+'</td><td>'+data[i].BasicMetabolism+'</td></tr>';
                    }
                }
                fat_data.xAxis.data = fat_key;
                fat_data.series[0].data = fat_FatRate;
                fat_data.series[0].data = fat_BasicMetabolism;
                fat.setOption(fat_data);
                $('#fat_table').find('tbody').html(html);
            });
        }
	</script>
@endif
@if($type == 'hb')
	<script type="text/javascript">
        var hb = echarts.init(document.getElementById('hb_chart'));
        hb_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['血红蛋白值']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'血红蛋白值',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        hb.setOption(hb_data);
	</script>
	<script type="text/javascript">
        $(function(){
            $('#hb_submit').click(function(){
                var hb_start_time = $('#hb_start_time').val();
                var hb_end_time   = $('#hb_end_time').val();
                var getData = {'startTime':hb_start_time,'endTime':hb_end_time,'asynchronous':1};
                get_chart_list(getData);
                return false;
            });
            var getData = {'asynchronous':1};
			get_chart_list(getData);
        });

        function get_chart_list(getData){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$code,'HealthType'=>'hb']) }}",getData,function(data){
                var hb_key = new Array();
                var hb_value = new Array();
                if(data){
                    var html = '';
                    for(var i=0;i<data.length;i++){
                        hb_key.push(data[i].MeasureTime);
                        hb_value.push(data[i].Hb);
                        html += '<tr><td>'+data[i].MeasureTime+'</td><td>'+data[i].Hb+'</td></tr>';
                    }
                }
                hb_data.xAxis.data = hb_key;
                hb_data.series[0].data = hb_value;
                hb.setOption(hb_data);
                $('#hb_table').find('tbody').html(html);
            });
        }
	</script>
@endif
@if($type == 'height')
	<script type="text/javascript">
        var height = echarts.init(document.getElementById('height_chart'));
        height_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['身高值','体重值','BMI值']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'身高值',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'体重值',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'BMI值',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        height.setOption(height_data);
	</script>
	<script type="text/javascript">
        $(function(){
            $('#height_submit').click(function(){
                var height_start_time = $('#height_start_time').val();
                var height_end_time   = $('#height_end_time').val();
                var getData = {'startTime':height_start_time,'endTime':height_end_time,'asynchronous':1};
                get_chart_list(getData);
                return false;
            });
            var getData = {'asynchronous':1};
            get_chart_list(getData);
        });

        function get_chart_list(getData){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$code,'HealthType'=>'height']) }}",getData,function(data){
                var height_key = new Array();
                var height_Height = new Array();
                var height_Weight = new Array();
                var height_BMI = new Array();
                if(data){
                    var html = '';
                    for(var i=0;i<data.length;i++){
                        height_key.push(data[i].MeasureTime);
                        height_Height.push(data[i].Height);
                        height_Weight.push(data[i].Weight);
                        height_BMI.push(data[i].BMI);
                        html += '<tr><td>'+data[i].MeasureTime+'</td><td>'+data[i].Height+'</td><td>'+data[i].Weight+'</td><td>'+data[i].BMI+'</td></tr>';
                    }
                }
                height_data.xAxis.data = height_key;
                height_data.series[0].data = height_Height;
                height_data.series[1].data = height_Weight;
                height_data.series[2].data = height_BMI;
                height.setOption(height_data);
                $('#height_table').find('tbody').html(html);
            });
        }
	</script>
@endif
@if($type == 'lung')
	<script type="text/javascript">
        var lung = echarts.init(document.getElementById('lung_chart'));
        lung_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['肺活量','用力肺活量']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'肺活量',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'用力肺活量',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        lung.setOption(lung_data);
	</script>
	<script type="text/javascript">
        $(function(){
            $('#lung_submit').click(function(){
                var lung_start_time = $('#lung_start_time').val();
                var lung_end_time   = $('#lung_end_time').val();
                var getData = {'startTime':lung_start_time,'endTime':lung_end_time,'asynchronous':1};
                get_chart_list(getData);
                return false;
            });
            var getData = {'asynchronous':1};
            get_chart_list(getData);
        });

        function get_chart_list(getData){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$code,'HealthType'=>'lung']) }}",getData,function(data){
                var lung_key = new Array();
                var lung_Lung = new Array();
                var lung_FVC = new Array();
                var lung_PEF  = new Array();
                var lung_FEF25 = new Array();
                var lung_FEF75 = new Array();
                var lung_FEF2575 = new Array();

                if(data){
                    var html = '';
                    for(var i=0;i<data.length;i++){
                        lung_key.push(data[i].MeasureTime);
                        lung_Lung.push(data[i].Lung);
                        lung_FVC.push(data[i].FVC);
                        lung_PEF.push(data[i].PEF);
                        lung_FEF25.push(data[i].FEF25);
                        lung_FEF75.push(data[i].FEF75);
                        lung_FEF2575.push(data[i].FEF2575);
                        html += '<tr><td>'+data[i].MeasureTime+'</td><td>'+data[i].Lung+'</td><td>'+data[i].FVC+'</td><td>'+data[i].PEF+'</td>' +
                            '<td>'+data[i].FEF25+'</td><td>'+data[i].FEF75+'</td><td>'+data[i].FEF2575+'</td></tr>';
                    }
                }
                lung_data.xAxis.data = lung_key;
                lung_data.series[0].data = lung_Lung;
                lung_data.series[1].data = lung_FVC;
                lung.setOption(lung_data);
                $('#lung_table').find('tbody').html(html);
            });
        }
	</script>
@endif
@if($type == 'minFat')
	<script type="text/javascript">
        var minFat = echarts.init(document.getElementById('minFat_chart'));
        minFat_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['体型','体质指数']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'体型',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'体质指数',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        minFat.setOption(minFat_data);
	</script>
	<script type="text/javascript">
        $(function(){
            $('#minFat_submit').click(function(){
                var minFat_start_time = $('#minFat_start_time').val();
                var minFat_end_time   = $('#minFat_end_time').val();
                var getData = {'startTime':minFat_start_time,'endTime':minFat_end_time,'asynchronous':1};
                get_chart_list(getData);
                return false;
            });
            var getData = {'asynchronous':1};
            get_chart_list(getData);
        });

        function get_chart_list(getData){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$code,'HealthType'=>'minFat']) }}",getData,function(data){
                var minFat_key = new Array();
                var minFat_Shape = new Array();
                var minFat_Physique = new Array();

                if(data){
                    var html = '';
                    for(var i=0;i<data.length;i++){
                        minFat_key.push(data[i].MeasureTime);
                        minFat_Shape.push(data[i].Shape);
                        minFat_Physique.push(data[i].Physique);
                        html += '<tr><td>'+data[i].MeasureTime+'</td><td>'+data[i].Shape+'</td><td>'+data[i].Physique+'</td></tr>';
                    }
                }
                minFat_data.xAxis.data = minFat_key;
                minFat_data.series[0].data = minFat_Shape;
                minFat_data.series[1].data = minFat_Physique;
                minFat.setOption(minFat_data);
                $('#minFat_table').find('tbody').html(html);
            });
        }
	</script>
@endif
@if($type == 'temperature')
	<script type="text/javascript">
        var temperature = echarts.init(document.getElementById('temperature_chart'));
        temperature_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['体温值']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'体温值',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        temperature.setOption(temperature_data);
	</script>
	<script type="text/javascript">
        $(function(){
            $('#temperature_submit').click(function(){
                var temperature_start_time = $('#temperature_start_time').val();
                var temperature_end_time   = $('#temperature_end_time').val();
                var getData = {'startTime':temperature_start_time,'endTime':temperature_end_time,'asynchronous':1};
                get_chart_list(getData);
                return false;
            });
            var getData = {'asynchronous':1};
            get_chart_list(getData);
        });

        function get_chart_list(getData){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$code,'HealthType'=>'temperature']) }}",getData,function(data){
                var temperature_key = new Array();
                var temperature_value = new Array();

                if(data){
                    var html = '';
                    for(var i=0;i<data.length;i++){
                        temperature_key.push(data[i].MeasureTime);
                        temperature_value.push(data[i].Temperature);
                        html += '<tr><td>'+data[i].MeasureTime+'</td><td>'+data[i].Temperature+'</td></tr>';
                    }
                }
                temperature_data.xAxis.data = temperature_key;
                temperature_data.series[0].data = temperature_value;
                temperature.setOption(temperature_data);
                $('#temperature_table').find('tbody').html(html);
            });
        }
	</script>
@endif
@if($type == 'uricAcid')
	<script type="text/javascript">
        var uricAcid = echarts.init(document.getElementById('uricAcid_chart'));
        uricAcid_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['尿酸值']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'尿酸值',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        uricAcid.setOption(uricAcid_data);
	</script>
	<script type="text/javascript">
        $(function(){
            $('#uricAcid_submit').click(function(){
                var uricAcid_start_time = $('#uricAcid_start_time').val();
                var uricAcid_end_time   = $('#uricAcid_end_time').val();
                var getData = {'startTime':uricAcid_start_time,'endTime':uricAcid_end_time,'asynchronous':1};
                get_chart_list(getData);
                return false;
            });
            var getData = {'asynchronous':1};
            get_chart_list(getData);
        });

        function get_chart_list(getData){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$code,'HealthType'=>'uricAcid']) }}",getData,function(data){
                var uricAcid_key = new Array();
                var uricAcid_value = new Array();

                if(data){
                    var html = '';
                    for(var i=0;i<data.length;i++){
                        uricAcid_key.push(data[i].MeasureTime);
                        uricAcid_value.push(data[i].Ua);
                        html += '<tr><td>'+data[i].MeasureTime+'</td><td>'+data[i].Ua+'</td></tr>';
                    }
                }
                uricAcid_data.xAxis.data = uricAcid_key;
                uricAcid_data.series[0].data = uricAcid_value;
                uricAcid.setOption(uricAcid_data);
                $('#uricAcid_table').find('tbody').html(html);
            });
        }
	</script>
@endif
@if($type == 'whr')
	<script type="text/javascript">
        var whr = echarts.init(document.getElementById('whr_chart'));
        whr_data = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['腰围','臀围','腰臀比']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['1','2','3','4','5','6','7']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'腰围',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
				{
                    name:'臀围',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                },
                {
                    name:'腰臀比',
                    type:'line',
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        whr.setOption(whr_data);
	</script>
	<script type="text/javascript">
        $(function(){
            $('#whr_submit').click(function(){
                var whr_start_time = $('#whr_start_time').val();
                var whr_end_time   = $('#whr_end_time').val();
                var getData = {'startTime':whr_start_time,'endTime':whr_end_time,'asynchronous':1};
                get_chart_list(getData);
                return false;
            });
            var getData = {'asynchronous':1};
            get_chart_list(getData);
        });

        function get_chart_list(getData){
            $.get("{{ URL::action("Tenant\\HealthController@getHealthListData",['IdCode'=>$code,'HealthType'=>'whr']) }}",getData,function(data){
                var whr_key = new Array();
                var whr_Waistline = new Array();
                var whr_Hipline = new Array();
                var whr_Whr = new Array();

                if(data){
                    var html = '';
                    for(var i=0;i<data.length;i++){
                        whr_key.push(data[i].MeasureTime);
                        whr_Waistline.push(data[i].Waistline);
                        whr_Hipline.push(data[i].Hipline);
                        whr_Whr.push(data[i].Whr);
                        html += '<tr><td>'+data[i].MeasureTime+'</td><td>'+data[i].Waistline+'</td><td>'+data[i].Hipline+'</td><td>'+data[i].Whr+'</td></tr>';
                    }
                }
                whr_data.xAxis.data = whr_key;
                whr_data.series[0].data = whr_Waistline;
                whr_data.series[1].data = whr_Hipline;
                whr_data.series[2].data = whr_Whr;
                whr.setOption(whr_data);
                $('#whr_table').find('tbody').html(html);
            });
        }
	</script>
@endif
