usuarios  Isolunet 
Super Admin
user: super_admin@hotmail.com
pas: Admin2021+

liderazgo 30/07
Base de datos 


usuario Hugo Ocampo
Usuario: hfocampo@gmail.com
contraseña: Hugo2021+

Usuario Alejandro:
Usuario: alejandroOcampo@gmail.com
Contraseña: Alejo2021+

//tablas para modificar


// 2021-10-19
CREATE TABLE `tbl_mejo_acta_acciones` (
  `id_acciones` int(10) UNSIGNED NOT NULL,
   `accion` text(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsable` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicio_acc` date NOT NULL,
  `fecha_final_acc` date NOT NULL,  
  `fk_acta` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `tbl_mejo_acta_acciones`
  ADD PRIMARY KEY (`id_acciones`),
  ADD KEY `fk_acta` (`fk_acta`);

ALTER TABLE `tbl_mejo_acta_acciones`
  MODIFY `id_acciones` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;


ALTER TABLE `tbl_mejo_acta_acciones`
  ADD CONSTRAINT `tbl_mejo_acta_acciones_ibfk_1` FOREIGN KEY (`fk_acta`) REFERENCES `tbl_mejo_acta` (`id_acta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;


ALTER TABLE `tbl_mejo_acta` DROP `accion`, DROP `responsable`, DROP `fecha_inicio_acc`, DROP `fecha_final_acc`;


// fin 2021-10-19

ALTER TABLE `tbl_mejo_acta_asistente` DROP `cargo`;

ALTER TABLE `tbl_mejo_acta` CHANGE `archivo` `archivo` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;
ALTER TABLE `tbl_mejo_acta` ADD `otros_user` VARCHAR(200) NOT NULL AFTER `terminada`;
ALTER TABLE `tbl_mejo_acta` CHANGE `otros_user` `otros_user` VARCHAR(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL;
ALTER TABLE `tbl_mejo_acta` CHANGE `archivo` `archivo` VARCHAR(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;
//enviar user login
     $empresa = Empresa::where('id_empresa',Auth::User()->fk_empresa)->where('bool_estado', '1')->first(); 
            if ($empresa==null) {
                Auth::logout();
                return Redirect::to('login')->with('status','El Administrador acaba de cerrar la empresa, para más información comuníquese con el administrador');
            }

//guardar archivo

 if ($request->file('archivo')) {
                $file =$request->file('archivo');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/archivos/planificacion/', $name);
            } else {
                $name='';
            }
$variable->archivo             = $name;

//actualizar archivo
          if ($request->file('archivo')) {
                $archivo=$request->get('archivo_anterior');
                //nombre para eliinar el anterior archivo
           
                    $mi_archivo= public_path().'/archivos/planificacion/'.$archivo;
        
                    if (is_file($mi_archivo)) {
                        //consulto si esta ena carpeta y borro
                        unlink(public_path().'/archivos/planificacion/'.$archivo);
                    }
                

                $file =$request->file('archivo');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/archivos/planificacion/', $name);
                $variable->archivo =  $name;
           
            }