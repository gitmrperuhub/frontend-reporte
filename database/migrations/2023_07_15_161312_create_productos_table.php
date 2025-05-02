<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table){
            $table->id();
            $table->string("codigo", 100)->unique()->comment("Codigo del producto");
            $table->string("serie", 100)->nulable()->comment("serie del producto");
            $table->string("descripcion", 100)->comment("Nombre del producto");
            $table->string("marca", 100)->comment("Marca del producto");
            $table->integer("categoria_id")->comment("Id categoria del producto  tabla => recursos");
            $table->integer("laboratorio_id")->comment("Id laboratio del producto tabla => laboratirios");
            $table->string("sintomas", 150)->nullable()->comment("Sintomas como descripción del producto");
            $table->string("registro_sanitario", 150)->nullable()->comment("Registro sanitario del producto");
            $table->string("unidad_medida", 5)->comment("Unida de medida del producto");
            $table->string("numero_lote", 50)->nullable()->comment("numero de lote del producto");
            $table->decimal("precio_compra", 10,2)->comment("precio compra del producto");
            $table->decimal("precio_venta_min", 10,2)->comment("precio venta minimo del producto");
            $table->decimal("precio_venta_max", 10,2)->comment("precio venta maximo del producto");
            $table->integer("stock")->comment("stock del producto");
            $table->integer("stock_min")->nullable()->comment("stock minimo del producto");
            $table->integer("stock_alerta")->comment("stock de alerta del producto");
            $table->integer("stock_registro")->comment("stock de registro, este valor jamas se modificara, porque es para saber con cuanto de stock ha ingresado el producto");
            $table->date("fecha_venc")->comment("fecha de vencimiento del producto");
            $table->date("fecha_venc_alerta")->comment("fecha de alerta de vencimiento del producto");
            $table->smallInteger("estado")->comment("Estado del producto (disponible, no disponible)");
            $table->integer("user_id_reg")->nullable()->comment("Id usuario registro tabla => users");
            $table->integer("user_id_upd")->nullable()->comment("Id usuario actualizacion tabla => users");
            $table->string("nombre_imagen")->nullable()->comment("Nombre del archivo del producto");
            $table->string("nombre_pdf")->nullable()->comment("Nombre del del pdf del producto");
            $table->string("tipo_registro")->nullable()->comment("tipo de registro del producto (importar de excel => 1, registro manual, 2)");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
