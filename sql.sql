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