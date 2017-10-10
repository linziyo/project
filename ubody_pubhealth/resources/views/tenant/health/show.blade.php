<div class="box box-primary">
    <div class="box-header">
		<ul>
			@if($data['alcohol'])
			<li>
				<div class="card">
					<div class="card-top">
						酒精浓度
					</div>
					@if($data['alcohol'][0]['health_analysis'] === false)
					<div class="card-middle text-success">正常</div>
					@else
					<div class="card-middle text-fail">非正常</div>
					@endif
					<div class="card-bottom">
						<span>酒精浓度值:{{ $data['alcohol'][0]['Alcohol'] }}% </span>
						<span class="ml10">参考标准:20%</span>
					</div>
				</div>
			</li>
			@endif
			@if($data['bloodFat'])
			<li>
				<div class="card">
					<div class="card-top">
						血脂
					</div>
					@if($data['bloodFat'][0]['health_analysis'] === false)
					<div class="card-middle text-success">正常</div>
					@else
					<div class="card-middle text-fail">非正常</div>
					@endif
					<div class="card-bottom">
						<span>总胆固醇:{{ $data['bloodFat'][0]['TChol'] }}</span>
						<span class="ml10">参考标准:2.86-5.98mmol/L </span><br>
						<span>高密度脂蛋白:{{ $data['bloodFat'][0]['HdlChol'] }}</span>
						<span class="ml10">参考标准:0.94-2.0mmol/L </span><br>
						<span>甘油三酯:{{ $data['bloodFat'][0]['Trig'] }}</span>
						<span class="ml10">参考标准:0.56-1.7mmol/L </span><br>
						<span>低密度脂蛋白:{{ $data['bloodFat'][0]['CalcLdl'] }}</span>
						<span class="ml10">参考标准:2.07-3.12mmol/L </span><br>
						<span>血脂比值:{{ $data['bloodFat'][0]['TcHdl'] }}</span>
					</div>
				</div>
			</li>
			@endif
			@if($data['bloodOxygen'])
			<li>
				<div class="card">
					<div class="card-top">
						血氧
					</div>
					@if($data['bloodOxygen'][0]['health_analysis'] === false)
					<div class="card-middle text-success">正常</div>
					@else
					<div class="card-middle text-fail">非正常</div>
					@endif
					<div class="card-bottom">
						<span>血氧值:{{ $data['bloodOxygen'][0]['Oxygen'] }}% </span>
						<span class="ml10">参考标准:95% </span><br>
						<span>血氧列表值:{{ $data['bloodOxygen'][0]['OxygenList'] }} </span>
						<span class="ml10">脉率值:{{ $data['bloodOxygen'][0]['Bpm'] }} </span><br>
						<span>脉率列表值:{{ $data['bloodOxygen'][0]['BpmList'] }} </span>
					</div>
				</div>
			</li>
			@endif
			@if($data['bloodPressure'])
			<li>
				<div class="card">
					<div class="card-top">
						血压
					</div>
					@if($data['bloodPressure'][0]['health_analysis'] === false)
					<div class="card-middle text-success">正常</div>
					@else
					<div class="card-middle text-fail">非正常</div>
					@endif
					<div class="card-bottom">
						<span>收缩压:{{ $data['bloodPressure'][0]['HighPressure'] }} </span>
						<span class="ml10">参考标准:60-89mmHg </span><br>
						<span>舒张压:{{ $data['bloodPressure'][0]['LowPressure'] }} </span>
						<span class="ml10">参考标准:90-139mmHg </span><br>
						<span>脉搏:{{ $data['bloodPressure'][0]['Pulse'] }} </span>
						<span class="ml10">参考标准:60-100mmHg </span>
					</div>
				</div>
			</li>
			@endif
			@if($data['bloodSugar'])
			<li>
				<div class="card">
					<div class="card-top">
						血糖
					</div>
					@if($data['bloodSugar'][0]['health_analysis'] === false)
					<div class="card-middle text-success">正常</div>
					@else
					<div class="card-middle text-fail">非正常</div>
					@endif
					<div class="card-bottom">
						@if($data['bloodSugar'][0]['BloodsugarType'] == 1)
						<span>空腹血糖:{{ $data['bloodSugar'][0]['BloodSugar'] }}</span>
						<span class="ml10">参考标准:3.9-6.1mmol/L</span><br>
						@elseif($data['bloodSugar'][0]['BloodsugarType'] == 2)
						<span>餐后血糖:{{ $data['bloodSugar'][1]['BloodSugar'] }}</span>
						<span class="ml10">参考标准:7.8-11.1mmol/L</span><br>
						@else
						<span>随机血糖:{{ $data['bloodSugar'][2]['BloodSugar'] }}</span>
						<span class="ml10">参考标准:<11.1mmol/L</span>
						@endif
					</div>
				</div>
			</li>
			@endif
			@if($data['bMD'])
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
			@if($data['cardiovascular'])
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
			@if($data['chol'])
			<li>
				<div class="card">
					<div class="card-top">
						总胆固醇
					</div>
					@if($data['chol'][0]['health_analysis'] === false)
						<div class="card-middle text-success">正常</div>
					@else
						<div class="card-middle text-fail">非正常</div>
					@endif
					<div class="card-bottom">
						<span>检测结果:{{ $data['chol'][0]['Chol'] }} </span>
						<span class="ml10">参考标准:2.86～5.98mmol/L</span>
					</div>
				</div>
			</li>
			@endif
			@if($data['ecg'])
			<li>
				<div class="card">
					<div class="card-top">
						远程心电
					</div>
					@if($data['ecg'][0]['health_analysis'] === false)
						<div class="card-middle text-success">正常</div>
					@else
						<div class="card-middle text-fail">非正常</div>
					@endif
					<div class="card-bottom">
						<span>心率:{{ $data['ecg'][0]['Hr'] }} </span>
						@if($data['member'][0]['Sex'] == 1)
						<span>参考标准:50-95 </span><br>
						@else
						<span>参考标准:55-95 </span><br>
						@endif
						<span>心电图数据:{{ $data['ecg'][0]['EcgData'] }} </span>
						<span>增益:{{ $data['ecg'][0]['nGain'] }} </span>
					</div>
				</div>
			</li>
			@endif
			@if($data['fat'])
			<li>
				<div class="card">
					<div class="card-top">
						脂肪
					</div>
					@if($data['fat'][0]['health_analysis'] === false)
						<div class="card-middle text-success">正常</div>
					@else
						<div class="card-middle text-fail">非正常</div>
					@endif
					<div class="card-bottom">
						<span>体脂占比:{{ $data['fat'][0]['FatRate'] }}% </span>
						<span class="ml10">体脂肪量:{{ $data['fat'][0]['Fat'] }}kg </span><br>
						<span>非脂肪量:{{ $data['fat'][0]['ExceptFat'] }}kg </span>
						<span class="ml10">体水占比:{{ $data['fat'][0]['WaterRate'] }}% </span><br>
						<span>水含量:{{ $data['fat'][0]['Water'] }}kg </span>
						<span class="ml10">矿物质:{{ $data['fat'][0]['Minerals'] }}kg </span><br>
						<span>蛋白质含量:{{ $data['fat'][0]['Protein'] }}kg </span>
						<span class="ml10">细胞内液:{{ $data['fat'][0]['Fic'] }}kg </span><br>
						<span>细胞外液:{{ $data['fat'][0]['Foc'] }}kg </span>
						<span class="ml10">肌肉量:{{ $data['fat'][0]['Muscle'] }}kg </span><br>
						<span>脂肪调节:{{ $data['fat'][0]['FatAdjust'] }}kg </span>
						<span class="ml10">体重调节:{{ $data['fat'][0]['WeightAdjust'] }}kg </span><br>
						<span>基础代谢:{{ $data['fat'][0]['BasicMetabolism'] }}kg </span>
						<span class="ml10">内脏脂肪等级:{{ $data['fat'][0]['Viscera'] }} </span><br>
						<span>骨骼量:{{ $data['fat'][0]['Bmc'] }}kg </span>
						<span class="ml10">肌肉率:{{ $data['fat'][0]['MuscleRate'] }}% </span><br>
						<span>躯干肌肉量:{{ $data['fat'][0]['QuganMuscle'] }}kg </span>
						<span class="ml10">躯干脂肪量:{{ $data['fat'][0]['QuganFat'] }}kg </span><br>
						<span>左腿肌肉量:{{ $data['fat'][0]['ZuotuiMuscle'] }}kg </span>
						<span class="ml10">左臂肌肉量:{{ $data['fat'][0]['ZuobiMuscle'] }}kg </span><br>
						<span>右臂肌肉量:{{ $data['fat'][0]['YoubiMuscle'] }}kg </span>
						<span class="ml10">右腿肌肉量:{{ $data['fat'][0]['YoutuiMuscle'] }}kg </span><br>
						<span>左臂脂肪量:{{ $data['fat'][0]['ZuobiFat'] }}kg </span>
						<span class="ml10">左腿脂肪量:{{ $data['fat'][0]['ZuotuiFat'] }}kg </span><br>
						<span>右臂脂肪量:{{ $data['fat'][0]['YoubiFat'] }}kg </span>
						<span class="ml10">右腿脂肪量:{{ $data['fat'][0]['YoutuiFat'] }}kg </span><br>
					</div>
				</div>
			</li>
			@endif
			@if($data['hb'])
			<li>
				<div class="card">
					<div class="card-top">
						血红蛋白
					</div>
					@if($data['hb'][0]['health_analysis'] === false)
						<div class="card-middle text-success">正常</div>
					@else
						<div class="card-middle text-fail">非正常</div>
					@endif
					<div class="card-bottom">
						@if($data['member'][0]['Sex'] == 1)
							<span>血红蛋白值:{{ $data['hb'][0]['Hb'] }}mmol/L </span>
							<span class="ml10">参考标准:7.45-9.93mmol/L </span><br>
							<span>红细胞比容:{{ $data['hb'][0]['Hct'] }}mmol/L </span>
							<span class="ml10">参考标准:40%-50% </span>
						@else
							<span>血红蛋白值:{{ $data['hb'][0]['Hb'] }}mmol/L </span>
							<span class="ml10">参考标准:6.83-9.31mmol/L </span><br>
							<span>红细胞比容:{{ $data['hb'][0]['Hct'] }}mmol/L </span>
							<span class="ml10">参考标准:37%-48% </span>
						@endif
					</div>
				</div>
			</li>
			@endif
			@if($data['height'])
			<li>
				<div class="card">
					<div class="card-top">
						身高体重
					</div>
					@if($data['height'][0]['health_analysis'] === false)
						<div class="card-middle text-success">正常</div>
					@else
						<div class="card-middle text-fail">非正常</div>
					@endif
					<div class="card-bottom">
						<span>身高:{{ $data['height'][0]['Height'] }}cm </span>
						<span class="ml10">体重:{{ $data['height'][0]['Weight'] }}kg </span><br>
						<span>BMI:{{ $data['height'][0]['BMI'] }} </span>
						<span class="ml10">理想体重:{{ $data['height'][0]['IdealWeight'] }}kg </span>
					</div>
				</div>
			</li>
			@endif
			@if($data['lung'])
			<li>
				<div class="card">
					<div class="card-top">
						肺活量
					</div>
					@if($data['lung'][0]['health_analysis'] === false)
						<div class="card-middle text-success">正常</div>
					@else
						<div class="card-middle text-fail">非正常</div>
					@endif
					<div class="card-bottom">
						@if($data['member'][0]['Sex'] == 1)
						<span>肺活量:{{ $data['lung'][0]['Lung'] }}ml </span>
						<span class="ml10">参考标准:>3470ml </span><br>
						<span>用力肺活量:{{ $data['lung'][0]['FVC'] }} </span>
						<span class="ml10">参考标准:>3062ml </span><br>
						@else
						<span>肺活量:{{ $data['lung'][0]['Lung'] }}ml </span>
						<span class="ml10">参考标准:>2440ml </span><br>
						<span>用力肺活量:{{ $data['lung'][0]['FVC'] }} </span>
						<span class="ml10">参考标准:>2266ml </span><br>
						@endif
						<span>用力呼气1秒量:{{ $data['lung'][0]['PEF'] }} </span>
						<span class="ml10">25% 肺活量时的用力呼气流速:{{ $data['lung'][0]['FEF25'] }} </span><br>
						<span>75% 肺活量时的用力呼气流速:{{ $data['lung'][0]['FEF75'] }} </span><br>
						<span>25% 肺活量到75%肺活量之间的平均呼气流速:{{ $data['lung'][0]['FEF2575'] }} </span>
					</div>
				</div>
			</li>
			@endif
			@if($data['minFat'])
			<li>
				<div class="card">
					<div class="card-top">
						人体成分(脂肪)
					</div>
					@if($data['minFat'][0]['health_analysis'] === false)
						<div class="card-middle text-success">正常</div>
					@else
						<div class="card-middle text-fail">非正常</div>
					@endif
					<div class="card-bottom">
						<span>身高:{{ $data['minFat'][0]['Height'] }}cm </span>
						<span class="ml10">体重:{{ $data['minFat'][0]['Weight'] }} </span><br>
						<span class="ml10">体脂肪率:{{ $data['minFat'][0]['FatRate'] }}% </span>
						<span class="ml10">基础代谢:{{ $data['minFat'][0]['BasicMetabolism'] }}</span><br>
						<span class="ml10">BMI:{{ $data['minFat'][0]['Bmi'] }} </span>
						<span class="ml10">体质指数:{{ $data['minFat'][0]['Physique'] }}</span><br>
						<span class="ml10">体型:{{ $data['minFat'][0]['Shape'] }} </span>
					</div>
				</div>
			</li>
			@endif
			@if($data['pEEcg'])
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
			@if($data['temperature'])
			<li>
				<div class="card">
					<div class="card-top">
						体温
					</div>
					@if($data['temperature'][0]['health_analysis'] === false)
						<div class="card-middle text-success">正常</div>
					@else
						<div class="card-middle text-fail">非正常</div>
					@endif
					<div class="card-bottom">
						<span>体温值:{{ $data['temperature'][0]['Temperature'] }}℃ </span>
					</div>
				</div>
			</li>
			@endif
			@if($data['uricAcid'])
			<li>
				<div class="card">
					<div class="card-top">
						血尿酸
					</div>
					@if($data['uricAcid'][0]['health_analysis'] === false)
						<div class="card-middle text-success">正常</div>
					@else
						<div class="card-middle text-fail">非正常</div>
					@endif
					<div class="card-bottom">
						<span>尿酸值:{{ $data['uricAcid'][0]['Ua'] }} </span>
						<span class="ml10">参考标准:(男性:0.21～0.43mmol/L 女性:0.16～0.36mmol/L 儿童:0.12～0.33mmol/L) </span><br>
					</div>
				</div>
			</li>
			@endif
			@if($data['urinalysis'])
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
			@if($data['whr'])
			<li>
				<div class="card">
					<div class="card-top">
						腰臀比
					</div>
					@if($data['whr'][0]['health_analysis'] === false)
						<div class="card-middle text-success">正常</div>
					@else
						<div class="card-middle text-fail">非正常</div>
					@endif
					<div class="card-bottom">
						<span>腰围:{{ $data['whr'][0]['Waistline'] }} </span>
						<span class="ml10">臀围:{{ $data['whr'][0]['Hipline'] }} </span><br>
						<span>腰臀比:{{ $data['whr'][0]['Whr'] }} </span>
						@if($data['member'][0]['Sex'] == 1)
						<span class="ml10">参考标准(腰臀比):≤90% </span>
						@else
						<span class="ml10">参考标准(腰臀比):≤80% </span>
						@endif
					</div>
				</div>
			</li>
			@endif
		</ul>
    </div>
   <div class="modal-footer">
    	<button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
    </div>
</div>
<div class="modal fade" id="ajax">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>