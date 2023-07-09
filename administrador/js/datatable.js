var tabla = document.querySelector('#tabla1');
            var dataTable = new DataTable(tabla,{

                
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info":"Mostrando _END_ registro por pagina; de un total de _TOTAL_ registros encontrados",
                    "infoEmpty": "No se esncontraron registros",
                    "infoFiltered": "",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu":"Mostrar " +' <select class="form-select px-4"> <option selected value="10">10</option> <option value="15" >15</option> <option value="20">20</option> </select> ' +" registros por pagina",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search":"Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                
            });

            $(document).ready(function() {
                $('#tabla2').DataTable( {
            
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info":"Mostrando _END_ registro por pagina; de un total de _TOTAL_ registros encontrados",
                        "infoEmpty": "No se esncontraron registros",
                        "infoFiltered": "",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu":"Mostrar " +'<select class="form-select"> <option selected value="10">10</option> <option value="15" >15</option> <option value="20">20</option> </select>' +" registros por pagina",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search":"Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'pdf',
                            text: '<i class="bi bi-file-earmark-pdf"></i>',
                            titleAttr:'Exportar a PDF',
                            className:'btn btn-danger'
                           
                        },
                        {
                            extend: 'excel',
                            text: '<i class="bi bi-file-earmark-excel"></i>',
                            titleAttr:'Exportar a Excel',
                            className:'btn btn-success'
                           
                        }
                        

                    ]
                
                } );
            } );