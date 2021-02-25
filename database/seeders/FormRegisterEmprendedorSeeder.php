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
      NivelEducativo::create(['opciones'=>'Básica']);
      NivelEducativo::create(['opciones'=>'Bachillerato']);
      NivelEducativo::create(['opciones'=>'Tercer Nivel']);
      NivelEducativo::create(['opciones'=>'Cuarto Nivel']);
      //TIPO DE DOCUMENTO
      TipoDocumentacion::create(['opciones'=>'Cedula de ciudadanía']);
      TipoDocumentacion::create(['opciones'=>'Cedula de extranjería']);
      //ESTADO EDUCATIVO
      EstadoEducativo::create(['opciones'=>'En curso']);
      EstadoEducativo::create(['opciones'=>'Finalizado']);
      EstadoEducativo::create(['opciones'=>'No aplica']);
      //TIPO DE TRABAJO
      TipoTrabajo::create(['opciones'=>'Emprendimiento propio']);
      TipoTrabajo::create(['opciones'=>'Relación de dependencia']);
      TipoTrabajo::create(['opciones'=>'Emprendimiento propio + relación de dependencia']);
      //SECTOR DE TRABAJO
      SectorTrabajo::create(['opciones'=>'Comercio']);
      SectorTrabajo::create(['opciones'=>'Gastronómico']);
      SectorTrabajo::create(['opciones'=>'Limpieza/Maestranza']);
      SectorTrabajo::create(['opciones'=>'Textil']);
      SectorTrabajo::create(['opciones'=>'Educación']);
      SectorTrabajo::create(['opciones'=>'Administración pública']);
      SectorTrabajo::create(['opciones'=>'Transporte']);
      SectorTrabajo::create(['opciones'=>'Construcción']);
      SectorTrabajo::create(['opciones'=>'Salud']);
      SectorTrabajo::create(['opciones'=>'Turismo']);
      //EMPRENDIMIENTO
      //¿HACE CUÁNTO TIEMPO TIENES TU EMPRENDIMIENTO?
      TiempoEmprendimento::create(['opciones'=>'Menos de 6 meses']);
      TiempoEmprendimento::create(['opciones'=>'Entre 6 meses y un año']);
      TiempoEmprendimento::create(['opciones'=>'Entre 1 y 3 años']);
      TiempoEmprendimento::create(['opciones'=>'Entre 3 y 5 años']);
      TiempoEmprendimento::create(['opciones'=>'Más de 5 años']);
      //¿CUÁL ES LA RAZÓN POR LA QUE COMENZASTE A EMPRENDER?
      RazonEmprender::create(['opciones'=>'Por necesidad']);
      RazonEmprender::create(['opciones'=>'Por oportunidad']);
      RazonEmprender::create(['opciones'=>'Por herencia']);
      //¿CUAL DE ESTOS TIPOS DE EMPRENDIMIENTO REALIZA USTED?
      TipoEmprendimiento::create(['opciones'=>'Comercialización']);
      TipoEmprendimiento::create(['opciones'=>'Producción']);
      TipoEmprendimiento::create(['opciones'=>'Transformación de materia prima o industrializar']);
      TipoEmprendimiento::create(['opciones'=>'Agrícola']);
      TipoEmprendimiento::create(['opciones'=>'Servicio']);
      //¿CUÁNTAS PERSONAS CONFORMAN TU EQUIPO DE TRABAJO?
      EquipoTrabajo::create(['opciones'=>'1 - 3']);
      EquipoTrabajo::create(['opciones'=>'4 - 6']);
      EquipoTrabajo::create(['opciones'=>'7 - 10']);
      EquipoTrabajo::create(['opciones'=>'Mas de 10']);
      //¿CUAL CONSIDERA USTED, ES LA OPCION MAS IMPORTANTE EN LA QUE UN MENTOR O ASESOR PODRIA AYUDAR AL CRECIMIENTO DE SU NEGOCIO?
      AyudarNegocio::create(['opciones'=>'Aprender sobre gestión de negocio: calcular costos, ordenar mis cuentas, armar estrategias de ventas.']);
      AyudarNegocio::create(['opciones'=>'Cómo invertir: en maquinaria, espacio físico, materia prima']);
      AyudarNegocio::create(['opciones'=>'Encontrar nuevos clientes y medios/lugares para vender: aprender a vender online, acceder a ferias, ser proveedor de empresas.']);
      AyudarNegocio::create(['opciones'=>'Formalizar mi negocio: asesorarme para formalización de empleados']);
      AyudarNegocio::create(['opciones'=>'Darle identidad a mi negocio con mi propia marca']);
      AyudarNegocio::create(['opciones'=>'Finanzas y tributación']);
      //¿CADA QUE TIEMPO TIENES LA CONSTUMBRE DE REGISTRAR O ANOTAR TUS CUENTAS, O LOS MOVIMIENTOS DE TU EMPRENDIMIENTO?
      MovimientoEmprendimiento::create(['opciones'=>'Día a día']);
      MovimientoEmprendimiento::create(['opciones'=>'Semana a semana']);
      MovimientoEmprendimiento::create(['opciones'=>'Mes a mes']);
      MovimientoEmprendimiento::create(['opciones'=>'Nunca']);
      //¿CUÁNDO TE ENCUENTRAS CON UNA DIFICULTAD, ¿BUSCAS AYUDA A OTRA PERSONA?
      BuscarAyuda::create(['opciones'=>'Siempre']);
      BuscarAyuda::create(['opciones'=>'Frecuentemente']);
      BuscarAyuda::create(['opciones'=>'Ocasionalmente']);
      BuscarAyuda::create(['opciones'=>'Nunca']);
      //¿QUÉ TIPO DE INCONVENIENTE PRESENTAS PARA FINANCIAR TU EMPRENDIMIENTO?
      TipoInconveniente::create(['opciones'=>'Desconocimiento de fuentes de inversión']);
      TipoInconveniente::create(['opciones'=>'Falta de capital']);
      TipoInconveniente::create(['opciones'=>'Problemas en el Buró de crédito']);
      TipoInconveniente::create(['opciones'=>'Falta de apoyo por entidades gubernamentales']);
      TipoInconveniente::create(['opciones'=>'Altas tasas de intereses']);
      //¿Para qué necesita la inversión?
      NecesidadInversion::create(['opciones'=>'Compra de equipo']);
      NecesidadInversion::create(['opciones'=>'Compra de materia prima']);
      NecesidadInversion::create(['opciones'=>'Materiales']);
      NecesidadInversion::create(['opciones'=>'Permisos']);
      NecesidadInversion::create(['opciones'=>'Capacitaciones']);

    }
}
