
                    <h1 class="h2"><b>MECANICOS</b></h1>
                    <table id="example2" class="table table-bordered  display nowrap">
                        <thead>
                            <tr>
                                <th>PLACA</th>
                                <th>MARCA</th>
                                <th>CLIENTE</th>
                                <th>ACCIÓN</th>
                            </tr>
                        </thead>

                        <?php
                        while ($row = mysqli_fetch_object($listadoV)) {
                            $idVehiculo = $row->Placa;
                             $marca = $row->Marca;
                             $idcliente = $row->IdCliente;
                            




                        ?>
                            <tr>


                                <td>

                                    <input class="col-sm-10 border-0" type="text" id='placa'  disabled value="<?php echo $idVehiculo; ?>">

                                </td>
                                <td>
                                    <p id="nombreMecanico"><?php echo $marca; ?></p>
                                </td>
                                <td>
                                    <p id="competenciaMecanico"><?php echo $idcliente; ?></p>

                                </td>
                                <td>
                                    <button class="btn btn-outline-success my-2 my-sm-0" id="botonText" onclick="enviarTexto2()" type="submit">ASIGNAR</button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                        <tbody>
                    </table>
                
               <script>
    $(document).ready(function() {
        
        $('#example2').DataTable({
            responsive: true,
            lengthMenu: [[1], [1]],
            language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                },
                "bInfo" : false
        });
    });  
    
    </script>