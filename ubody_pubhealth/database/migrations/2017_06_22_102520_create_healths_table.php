<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healths', function (Blueprint $table) {
            $table->increments('id');
            $table->string('MachineId')->nullable();
            $table->string('UnitNo')->nullable();
            $table->string('UnitName')->nullable();
            $table->string('MacAddr')->nullable();
            $table->string('RecordNo')->nullable();
            $table->string('MeasureTime')->nullable();
            $table->string('DeviceType')->nullable();
            $table->string('LoginType')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        $this->createMemberTable();
        $this->createHeightTable();
        $this->createFatTable();
        $this->createMinFatTable();
        $this->createBloodPressureTable();
        $this->createBloodOxygenTable();
        $this->createEcgTable();
        $this->createPEEcgTable();
        $this->createTemperatureTable();
        $this->createWhrTable();
        $this->createBloodSugarTable();
        $this->createUricAcidTable();
        $this->createCholTable();
        $this->createBloodFatTable();
        $this->createCardiovascularTable();
        $this->createBMDTable();
        $this->createHbTable();
        $this->createAlcoholTable();
        $this->createLungTable();
        $this->createMicaeteryTable();
        $this->createUrinalysisTable();
        $this->createRemoteEcgTable();
        $this->createArteryPWVTable();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('healths');
        Schema::dropIfExists('health_height');
        Schema::dropIfExists('health_fat');
        Schema::dropIfExists('health_min_fat');
        Schema::dropIfExists('health_blood_pressure');
        Schema::dropIfExists('health_blood_oxygen');
        Schema::dropIfExists('health_ecg');
        Schema::dropIfExists('health_peecg');
        Schema::dropIfExists('health_temperature');
        Schema::dropIfExists('health_whr');
        Schema::dropIfExists('health_blood_sugar');
        Schema::dropIfExists('health_uric_acid');
        Schema::dropIfExists('health_chol');
        Schema::dropIfExists('health_blood_fat');
        Schema::dropIfExists('health_cardiovascular');
        Schema::dropIfExists('health_bmd');
        Schema::dropIfExists('health_hb');
        Schema::dropIfExists('health_alcohol');
        Schema::dropIfExists('health_lung');
        Schema::dropIfExists('health_micaetery');
        Schema::dropIfExists('health_urinalysis');
        Schema::dropIfExists('health_remote_ecg');
        Schema::dropIfExists('health_artery_pwv');
    }

    /*
     * 身高体重
     */
    private function createHeightTable()
    {
        Schema::create('health_height', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('health_id')->unsigned();
            $table->string('Height');
            $table->string('Weight');
            $table->string('BMI');
            $table->string('IdealWeight');
            $table->string('Result');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('health_id')->references('id')->on('healths')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /*
     * 脂肪
     */
    private function createFatTable()
    {
        Schema::create('health_fat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('health_id')->unsigned();
            $table->string('FatRate')->nullable();
            $table->string('Fat')->nullable();
            $table->string('ExceptFat')->nullable();
            $table->string('WaterRate')->nullable();
            $table->string('Water')->nullable();
            $table->string('Minerals')->nullable();
            $table->string('Protein')->nullable();
            $table->string('Fic')->nullable();
            $table->string('Foc')->nullable();
            $table->string('Muscle')->nullable();
            $table->string('FatAdjust')->nullable();
            $table->string('WeightAdjust')->nullable();
            $table->string('MuscleAdjust')->nullable();
            $table->string('BasicMetabolism')->nullable();
            $table->string('Viscera')->nullable();
            $table->string('Bmc')->nullable();
            $table->string('MuscleRate')->nullable();
            $table->string('QuganMuscle')->nullable();
            $table->string('QuganFat')->nullable();
            $table->string('ZuotuiMuscle')->nullable();
            $table->string('ZuobiMuscle')->nullable();
            $table->string('YoubiMuscle')->nullable();
            $table->string('YoutuiMuscle')->nullable();
            $table->string('ZuobiFat')->nullable();
            $table->string('ZuotuiFat')->nullable();
            $table->string('YoubiFat')->nullable();
            $table->string('YoutuiFat')->nullable();
            $table->string('Result')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('health_id')->references('id')->on('healths')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /*
     * 人体成分脂肪
     */
    private function createMinFatTable()
    {
        Schema::create('health_min_fat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('health_id')->unsigned();
            $table->string('Height')->nullable();
            $table->string('Weight')->nullable();
            $table->string('FatRate')->nullable();
            $table->string('BasicMetabolism')->nullable();
            $table->string('Bmi')->nullable();
            $table->string('Physique')->nullable();
            $table->string('Shape')->nullable();
            $table->string('Result')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('health_id')->references('id')->on('healths')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /*
     * 血压
     */
    private function createBloodPressureTable()
    {
        Schema::create('health_blood_pressure', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('health_id')->unsigned();
            $table->string('HighPressure')->nullable();
            $table->string('LowPressure')->nullable();
            $table->string('Pulse')->nullable();
            $table->string('Result')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('health_id')->references('id')->on('healths')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /*
     * 血氧
     */
    private function createBloodOxygenTable()
    {
        Schema::create('health_blood_oxygen', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('health_id')->unsigned();
            $table->string('Oxygen')->nullable();
            $table->string('OxygenList')->nullable();
            $table->string('Bpm')->nullable();
            $table->string('BpmList')->nullable();
            $table->string('Result')->nullable();
            $table->string('StartTime')->nullable();
            $table->string('EndTime')->nullable();
            $table->string('SecondCount')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('health_id')->references('id')->on('healths')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /*
     * 单导心电
     */
    private function createEcgTable()
    {
        Schema::create('health_ecg', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('health_id')->unsigned();
            $table->string('Hr')->nullable();
            $table->text('EcgData')->nullable();
            $table->string('nGain')->nullable();
            $table->string('Result')->nullable();
            $table->string('Analysis')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('health_id')->references('id')->on('healths')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /*
     * 12导心电
     */
    private function createPEEcgTable()
    {
        Schema::create('health_peecg', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('health_id')->unsigned();
            $table->string('Hr')->nullable();
            $table->string('PAxis')->nullable();
            $table->string('QRSAxis')->nullable();
            $table->string('TAxis')->nullable();
            $table->string('PR')->nullable();
            $table->string('QRS')->nullable();
            $table->string('QT')->nullable();
            $table->string('QTc')->nullable();
            $table->string('RV5')->nullable();
            $table->string('SV1')->nullable();
            $table->text('EcgData')->nullable();
            $table->text('EcgImg')->nullable();
            $table->string('Result')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('health_id')->references('id')->on('healths')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /*
     * 体温
     */
    private function createTemperatureTable()
    {
        Schema::create('health_temperature', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('health_id')->unsigned();
            $table->string('Temperature')->nullable();
            $table->string('Result')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('health_id')->references('id')->on('healths')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /*
     * 腰臀比
     */
    private function createWhrTable()
    {
        Schema::create('health_whr', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('health_id')->unsigned();
            $table->string('Waistline')->nullable();
            $table->string('Hipline')->nullable();
            $table->string('Whr')->nullable();
            $table->string('Result')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('health_id')->references('id')->on('healths')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /*
     * 血糖
     */
    private function createBloodSugarTable()
    {
        Schema::create('health_blood_sugar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('health_id')->unsigned();
            $table->string('BloodSugar')->nullable();
            $table->string('BloodsugarType')->nullable();
            $table->string('Result')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('health_id')->references('id')->on('healths')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /*
     * 尿酸
     */
    private function createUricAcidTable()
    {
        Schema::create('health_uric_acid', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('health_id')->unsigned();
            $table->string('Ua')->nullable();
            $table->string('Result')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('health_id')->references('id')->on('healths')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /*
     * 总胆固醇
     */
    private function createCholTable()
    {
        Schema::create('health_chol', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('health_id')->unsigned();
            $table->string('Chol')->nullable();
            $table->string('Result')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('health_id')->references('id')->on('healths')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /*
     * 血脂
     */
    private function createBloodFatTable()
    {
        Schema::create('health_blood_fat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('health_id')->unsigned();
            $table->string('TChol')->nullable();
            $table->string('HdlChol')->nullable();
            $table->string('Trig')->nullable();
            $table->string('TcHdl')->nullable();
            $table->string('CalcLdl')->nullable();
            $table->string('Result')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('health_id')->references('id')->on('healths')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /*
     * 心血管
     */
    private function createCardiovascularTable()
    {
        Schema::create('health_cardiovascular', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('health_id')->unsigned();
            $table->text('HeartFunction1')->nullable();
            $table->text('VascularCondition1')->nullable();
            $table->text('HeartFunction2')->nullable();
            $table->text('VascularCondition2')->nullable();
            $table->string('Result')->nullable();
            $table->string('SV')->nullable();
            $table->string('CO')->nullable();
            $table->string('HOV')->nullable();
            $table->string('CMBV')->nullable();
            $table->string('TPR')->nullable();
            $table->string('PAWP')->nullable();
            $table->string('N')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('health_id')->references('id')->on('healths')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /*
     * 骨密度
     */
    private function createBMDTable()
    {
        Schema::create('health_bmd', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('health_id')->unsigned();
            $table->string('TSCORE')->nullable();
            $table->string('ZSCORE')->nullable();
            $table->string('OI')->nullable();
            $table->string('BQI')->nullable();
            $table->string('SOS')->nullable();
            $table->string('YOUNG_ADULT')->nullable();
            $table->string('AGE_MATCHED')->nullable();
            $table->string('BUA')->nullable();
            $table->string('EOA')->nullable();
            $table->string('RRF')->nullable();
            $table->string('PAB')->nullable();
            $table->string('Result')->nullable();
            $table->string('GraphBmp')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('health_id')->references('id')->on('healths')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /*
     * 血红蛋白
     */
    private function createHbTable()
    {
        Schema::create('health_hb', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('health_id')->unsigned();
            $table->string('Hb')->nullable();
            $table->string('Hct')->nullable();
            $table->string('Result')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('health_id')->references('id')->on('healths')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /*
     * 酒精含量
     */
    private function createAlcoholTable()
    {
        Schema::create('health_alcohol', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('health_id')->unsigned();
            $table->string('Alcohol')->nullable();
            $table->string('Result')->nullable();
            $table->string('AlcoholImg')->nullable();
            $table->string('errcode')->nullable();
            $table->string('errinfo')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('health_id')->references('id')->on('healths')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /*
     * 肺活量
     */
    private function createLungTable()
    {
        Schema::create('health_lung', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('health_id')->unsigned();
            $table->string('Lung')->nullable();
            $table->string('FVC')->nullable();
            $table->string('FEV1')->nullable();
            $table->string('PEF')->nullable();
            $table->string('FEF25')->nullable();
            $table->string('FEF75')->nullable();
            $table->string('FEF2575')->nullable();
            $table->string('Result')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('health_id')->references('id')->on('healths')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /*
     * 迈克大夫动脉硬化
     */
    private function createMicaeteryTable()
    {
        Schema::create('health_micaetery', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('health_id')->unsigned();
            $table->string('MAP')->nullable();
            $table->string('PP')->nullable();
            $table->string('ABI')->nullable();
            $table->string('Afib')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('health_id')->references('id')->on('healths')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /*
     * 尿液分析
     */
    private function createUrinalysisTable()
    {
        Schema::create('health_urinalysis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('health_id')->unsigned();
            $table->string('URO')->nullable();
            $table->string('BLD')->nullable();
            $table->string('BIL')->nullable();
            $table->string('KET')->nullable();
            $table->string('LEU')->nullable();
            $table->string('GLU')->nullable();
            $table->string('PRO')->nullable();
            $table->string('PH')->nullable();
            $table->string('NIT')->nullable();
            $table->string('SG')->nullable();
            $table->string('VC')->nullable();
            $table->string('MAL')->nullable();
            $table->string('CR')->nullable();
            $table->string('UCA')->nullable();
            $table->string('Result')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('health_id')->references('id')->on('healths')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /*
     * 远程心电
     */
    private function createRemoteEcgTable()
    {
        Schema::create('health_remote_ecg', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('health_id')->unsigned();
            $table->string('ReportCode')->nullable();
            $table->string('Result')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('health_id')->references('id')->on('healths')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /*
     * 脉搏波速仪-动脉硬化
     */
    private function createArteryPWVTable()
    {
        Schema::create('health_artery_pwv', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('health_id')->unsigned();
            $table->string('ZdmPwv')->nullable();
            $table->string('SzdmPwv')->nullable();
            $table->string('XzdmPwv')->nullable();
            $table->string('Abi')->nullable();
            $table->string('AppSys')->nullable();
            $table->string('AppDia')->nullable();
            $table->string('ImgPath1')->nullable();
            $table->string('ImgPath2')->nullable();
            $table->string('ImgPath3')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('health_id')->references('id')->on('healths')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    private function createMemberTable()
    {
        Schema::create('health_member', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('health_id')->unsigned();
            $table->string('Name')->nullable();
            $table->string('Mobile')->nullable();
            $table->string('IdCode')->nullable();
            $table->string('Age')->nullable();
            $table->string('Sex')->nullable();
            $table->string('Address')->nullable();
            $table->string('Birthday')->nullable();
            $table->string('UserIcon')->nullable();
            $table->string('Nation')->nullable();
            $table->string('StartDate')->nullable();
            $table->string('EndDate')->nullable();
            $table->string('Department')->nullable();
            $table->string('BarCode')->nullable();
            $table->string('IcCode')->nullable();
            $table->string('SocialCode')->nullable();
            $table->string('UserID')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('health_id')->references('id')->on('healths')->onUpdate('cascade')->onDelete('cascade');
        });
    }
}
