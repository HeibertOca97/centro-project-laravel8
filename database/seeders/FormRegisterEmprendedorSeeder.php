<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//DATOS GENERALES
use App\Models\NivelEducativo;
use App\Models\EstadoEducativo;
use App\Models\TipoTrabajo;
use App\Models\TipoDocumentacion;
use App\Models\SectorTrabajo;
//DATOS DE EMPRENDIMIENTO
use App\Models\TiempoEmprendimento;
use App\Models\RazonEmprender;
use App\Models\TipoEmprendimiento;
use App\Models\EquipoTrabajo;
use App\Models\AyudarNegocio;
use App\Models\MovimientoEmprendimiento;
use App\Models\BuscarAyuda;
use App\Models\TipoInconveniente;
use App\Models\NecesidadInversion;

class FormRegisterEmprendedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //NIVEL EDUCATIVO
      NivelEducativo::create(['nivel_edu'=>'Básica']);
      NivelEducativo::create(['nivel_edu'=>'Bachillerato']);
      NivelEducativo::create(['nivel_edu'=>'Tercer Nivel']);
      NivelEducativo::create(['nivel_edu'=>'Cuarto Nivel']);
      //TIPO DE DOCUMENTO
      TipoDocumentacion::create(['tipo_doc'=>'Cedula de ciudadanía']);
      TipoDocumentacion::create(['tipo_doc'=>'Cedula de extranjería']);
      //ESTADO EDUCATIVO
      EstadoEducativo::create(['estado_edu'=>'En curso']);
      EstadoEducativo::create(['estado_edu'=>'Finalizado']);
      EstadoEducativo::create(['estado_edu'=>'No aplica']);
      //TIPO DE TRABAJO
      TipoTrabajo::create(['tipo_tb'=>'Emprendimiento propio']);
      TipoTrabajo::create(['tipo_tb'=>'Relación de dependencia']);
      TipoTrabajo::create(['tipo_tb'=>'Emprendimiento propio + relación de dependencia']);
      //SECTOR DE TRABAJO
      SectorTrabajo::create(['sectores_tb'=>'Comercio']);
      SectorTrabajo::create(['sectores_tb'=>'Gastronómico']);
      SectorTrabajo::create(['sectores_tb'=>'Limpieza/Maestranza']);
      SectorTrabajo::create(['sectores_tb'=>'Textil']);
      SectorTrabajo::create(['sectores_tb'=>'Educación']);
      SectorTrabajo::create(['sectores_tb'=>'Administración pública']);
      SectorTrabajo::create(['sectores_tb'=>'Transporte']);
      SectorTrabajo::create(['sectores_tb'=>'Construcción']);
      SectorTrabajo::create(['sectores_tb'=>'Salud']);
      SectorTrabajo::create(['sectores_tb'=>'Turismo']);
      //EMPRENDIMIENTO
      //¿HACE CUÁNTO TIEMPO TIENES TU EMPRENDIMIENTO?
      TiempoEmprendimento::create(['descripcion'=>'Menos de 6 meses']);
      TiempoEmprendimento::create(['descripcion'=>'Entre 6 meses y un año']);
      TiempoEmprendimento::create(['descripcion'=>'Entre 1 y 3 años']);
      TiempoEmprendimento::create(['descripcion'=>'Entre 3 y 5 años']);
      TiempoEmprendimento::create(['descripcion'=>'Más de 5 años']);
      //¿CUÁL ES LA RAZÓN POR LA QUE COMENZASTE A EMPRENDER?
      RazonEmprender::create(['descripcion'=>'Por necesidad']);
      RazonEmprender::create(['descripcion'=>'Por oportunidad']);
      RazonEmprender::create(['descripcion'=>'Por herencia']);
      //¿CUAL DE ESTOS TIPOS DE EMPRENDIMIENTO REALIZA USTED?
      TipoEmprendimiento::create(['descripcion'=>'Comercialización']);
      TipoEmprendimiento::create(['descripcion'=>'Producción']);
      TipoEmprendimiento::create(['descripcion'=>'Transformación de materia prima o industrializar']);
      TipoEmprendimiento::create(['descripcion'=>'Agrícola']);
      TipoEmprendimiento::create(['descripcion'=>'Servicio']);
      //¿CUÁNTAS PERSONAS CONFORMAN TU EQUIPO DE TRABAJO?
      EquipoTrabajo::create(['descripcion'=>'1 - 3']);
      EquipoTrabajo::create(['descripcion'=>'4 - 6']);
      EquipoTrabajo::create(['descripcion'=>'7 - 10']);
      EquipoTrabajo::create(['descripcion'=>'Mas de 10']);
      //¿CUAL CONSIDERA USTED, ES LA OPCION MAS IMPORTANTE EN LA QUE UN MENTOR O ASESOR PODRIA AYUDAR AL CRECIMIENTO DE SU NEGOCIO?
      AyudarNegocio::create(['descripcion'=>'Aprender sobre gestión de negocio: calcular costos, ordenar mis cuentas, armar estrategias de ventas.']);
      AyudarNegocio::create(['descripcion'=>'Cómo invertir: en maquinaria, espacio físico, materia prima']);
      AyudarNegocio::create(['descripcion'=>'Encontrar nuevos clientes y medios/lugares para vender: aprender a vender online, acceder a ferias, ser proveedor de empresas.']);
      AyudarNegocio::create(['descripcion'=>'Formalizar mi negocio: asesorarme para formalización de empleados']);
      AyudarNegocio::create(['descripcion'=>'Darle identidad a mi negocio con mi propia marca']);
      AyudarNegocio::create(['descripcion'=>'Finanzas y tributación']);
      //¿CADA QUE TIEMPO TIENES LA CONSTUMBRE DE REGISTRAR O ANOTAR TUS CUENTAS, O LOS MOVIMIENTOS DE TU EMPRENDIMIENTO?
      MovimientoEmprendimiento::create(['descripcion'=>'Día a día']);
      MovimientoEmprendimiento::create(['descripcion'=>'Semana a semana']);
      MovimientoEmprendimiento::create(['descripcion'=>'Mes a mes']);
      MovimientoEmprendimiento::create(['descripcion'=>'Nunca']);
      //¿CUÁNDO TE ENCUENTRAS CON UNA DIFICULTAD, ¿BUSCAS AYUDA A OTRA PERSONA?
      BuscarAyuda::create(['descripcion'=>'Siempre']);
      BuscarAyuda::create(['descripcion'=>'Frecuentemente']);
      BuscarAyuda::create(['descripcion'=>'Ocasionalmente']);
      BuscarAyuda::create(['descripcion'=>'Nunca']);
      //¿QUÉ TIPO DE INCONVENIENTE PRESENTAS PARA FINANCIAR TU EMPRENDIMIENTO?
      TipoInconveniente::create(['descripcion'=>'Desconocimiento de fuentes de inversión']);
      TipoInconveniente::create(['descripcion'=>'Falta de capital']);
      TipoInconveniente::create(['descripcion'=>'Problemas en el Buró de crédito']);
      TipoInconveniente::create(['descripcion'=>'Falta de apoyo por entidades gubernamentales']);
      TipoInconveniente::create(['descripcion'=>'Altas tasas de intereses']);
      //¿Para qué necesita la inversión?
      NecesidadInversion::create(['descripcion'=>'Compra de equipo']);
      NecesidadInversion::create(['descripcion'=>'Compra de materia prima']);
      NecesidadInversion::create(['descripcion'=>'Materiales']);
      NecesidadInversion::create(['descripcion'=>'Permisos']);
      NecesidadInversion::create(['descripcion'=>'Capacitaciones']);

    }
}
