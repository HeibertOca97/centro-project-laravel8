<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmprendimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprendimientos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_emp',150);
            $table->integer('opc_dir');
            $table->string('dir_emp',200);
            $table->string('servicio',200);
            $table->string('descripcion_emp',255);
            $table->unsignedBigInteger('tiempoemprendimento_id')->nullable();
            $table->unsignedBigInteger('razonemprender_id')->nullable();
            $table->unsignedBigInteger('tipoemprendimiento_id')->nullable();//--
            $table->string('tipo_emp',50);//--
            $table->string('producto',255);
            $table->integer('materia_prima');
            $table->string('materiales',255);
            $table->integer('opc_formalizado');
            $table->integer('opc_formalizacion');
            $table->integer('eq_emp');
            $table->unsignedBigInteger('equipotrabajo_id')->nullable();
            $table->integer('capacitacion');
            $table->string('desc_cap',255);
            $table->unsignedBigInteger('ayudarnegocio_id')->nullable();//--
            $table->string('ayuda_negocio',255);//--
            $table->integer('ruc_rise');
            $table->unsignedBigInteger('movimientoemprendimiento_id')->nullable();
            $table->unsignedBigInteger('buscasayuda_id')->nullable();
            $table->integer('tipo_credito');
            $table->integer('ent_financiera');
            $table->unsignedBigInteger('tipoinconveniente_id')->nullable();//--
            $table->string('inconveniente',150);//--
            $table->integer('bus_inversion');
            $table->double('monto_inv',15,2);
            $table->unsignedBigInteger('necesidadinversion_id')->nullable();//--
            $table->string('necesidad_inv',150);//--
            $table->unsignedBigInteger('emprendedore_id')->unique();
            
            $table->timestamps();

            $table->foreign('tiempoemprendimento_id')->references('id')->on('tiempoemprendimentos')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('razonemprender_id')->references('id')->on('razonemprenders')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('tipoemprendimiento_id')->references('id')->on('tipoemprendimientos')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('equipotrabajo_id')->references('id')->on('equipotrabajos')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('ayudarnegocio_id')->references('id')->on('ayudarnegocios')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('movimientoemprendimiento_id')->references('id')->on('movimientoemprendimientos')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('buscasayuda_id')->references('id')->on('buscasayudas')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('tipoinconveniente_id')->references('id')->on('tipoinconvenientes')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('emprendedore_id')
            ->references('id')
            ->on('emprendedores')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emprendimientos');
    }
}
