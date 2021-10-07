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