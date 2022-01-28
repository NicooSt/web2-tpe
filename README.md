# Pagina web avanzada
Esta es una página creada solo con la intención de practicar y de plasmar los conocimientos adquiridos.

En la página se muestra un par de tablas relacionadas de la forma 1 a N, es decir, una categoría
a la que pueden pertenecer N cantidad de ítems. En este caso la categoría será marcas automotrices reconocidas
como Chevrolet, Ford, etc. Y los ítems serán algunos de los distintos modelos de cada marca.
La página funciona en un servidor web local, en este caso se utilizó Apache.

## Tecnologías
- HTML      
- CSS       
- JavaScript
- PHP
- MySQL
- Smarty
- Vue.js
- jQuery

## Funcionalidades
- Registro, logueo y deslogueo:
  - El usuario se puede registrar con usuario y contraseña. 
  - Al registrarse el usuario se loguea automáticamente.
  - El usuario queda guardado en una base de datos por lo que otra persona no podrá utilizar el mismo nombre para registrarse posteriormente.
  - Una vez ingresado, el usuario tiene la posibilidad de cerrar la sesión o de otra forma esta se mantendrá activa.
- Usuario regular y administrador:
  - Al registrarse el usuario es regular, es decir, puede ingresar, pero no tiene acceso a ciertas funciones.
  - El regular solo puede mirar las tablas, la descripción de los ítems y hacer comentarios.
  - El administrador puede dar o quitar permisos de admin a otros usuarios.
  - El admin puede eliminar a otros usuarios.
  - El admin puede agregar, modificar o eliminar ítems y categorías.
  - El admin puede agregar o eliminar imágenes y comentarios de los ítems.
- Tablas:
  - Las tablas están relacionadas con clave foránea.
  - Para eliminar una categoría no debe haber ítems que estén relacionados.
  - La tabla de ítems tiene la opción de ingresar a la descripción del ítem.
  - La tabla de ítems tiene la opción de agregar, editar o eliminar ítems e imágenes.
  - Solo se mostrarán las opciones de agregar, editar o eliminar a los usuarios admin.
  - La tabla posee un filtro en el que se podrá filtrar a los ítems por categoría.
- Paginación:
  - La tabla de ítems posee una paginación cada 5 ítems en la que se podrá elegir a que página ir.
  - Posee la opción de ir a la página anterior o a la siguiente.
  - Posee la opción de ir a la página del principio o a la última.
  - La opción del principio y de la última se deshabilitan si la página esta en alguno de estos extremos.
- Comentarios:
  - El usuario puede ingresar a la descripción del ítem y hacer comentarios.
  - El comentario debe tener un contenido y una puntuación con estrellas de 1 a 5.
  - Los comentarios están hechos con Api Rest (creada) y Ajax por lo que la pagina no se recarga al agregar nuevos.
  - Los comentarios al publicarse tienen el nombre del usuario, la fecha y el puntaje ingresado.
  - Solo el admin puede eliminar los comentarios.
- Búsqueda avanzada:
  - La página posee un formulario de búsqueda avanzada de ítems.
  - La búsqueda funciona igual que el filtro solo que además se puede buscar por los demás atributos del ítem.
  - Los atributos del ítem son 4 por lo que se podrá buscar por 1, 2, 3 o los 4 atributos.

Cuenta admin:
- User: NICO
- Pass: 1234
   
## Próximas funciones a agregar
- Orden de comentarios por antigüedad o puntaje.
- Filtro de comentarios por cantidad de puntos.
- Diseño responsive
