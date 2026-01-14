<a name="top"></a>

# 🏭 El patrón Abstract Factory - Guía Completa

Repositorio creado para explicar el patrón **Abstract Factory** y su implementación mediante un ejemplo práctico en **PHP** (Tienda de Muebles).

<br>

## 📖 Tabla de contenidos

<details>
  <summary>Mostrar contenidos</summary>
  <br>
  <ul>
    <li>🏭 <a href="#-el-patrón-abstract-factory">El patrón Abstract Factory</a>
      <ul>
        <li>💡 <a href="#-entendiendo-la-definición">Entendiendo la definición</a></li>
        <li>👨🏼‍🔧 <a href="#-aplicando-la-definición-a-un-caso-práctico-tienda-de-muebles">Aplicando la definición a un caso práctico: Tienda de Muebles</a></li>
        <li>🛂 <a href="#-elementos-obligatorios-que-debe-tener-un-patrón-abstract-factory">Elementos obligatorios que debe tener un patrón Abstract Factory</a></li>
        <li>🎯 <a href="#-qué-objetivos-se-buscan-al-aplicar-el-patrón-abstract-factory">¿Qué objetivos se buscan al aplicar el patrón Abstract Factory?</a></li>
      </ul>
    </li>
    <li>🧪 <a href="#-ejemplo-de-implementación-tienda-de-muebles">Ejemplo de implementación: Tienda de Muebles</a>
      <ul>
        <li>🎡 <a href="#-qué-hace-esta-aplicación-de-ejemplo">¿Qué hace esta aplicación de ejemplo?</a></li>
        <li>🔄 <a href="#-flujo-completo-de-esta-aplicación-de-ejemplo">Flujo completo de esta aplicación de ejemplo</a></li>
        <li>👉🏼 <a href="#-identificación-de-los-principales-archivos-del-ejemplo">Identificación de los principales archivos del ejemplo</a></li>
      </ul>
    </li>
    <li>📂 <a href="#-estructura-del-proyecto-y-composer">Estructura del Proyecto y Composer</a></li>
    <li>📋 <a href="#-requisitos">Requisitos</a></li>
    <li>🚀 <a href="#-instalación-y-ejecución">Instalación y Ejecución</a></li>
  </ul>
</details>

---

<br>

## 🏭 El patrón Abstract Factory

**Abstract Factory** es un patrón de diseño **creacional** que define una **fábrica abstracta** (interfaz o clase abstracta) que declara diversos **métodos fábrica**, cada uno de ellos responsable de la creación de un objeto de tipo **producto abstracto**, todos ellos pertenecientes a una misma familia o variante, delegando en las clases que implementan dicha interfaz, llamadas **fábricas concretas** la responsabilidad de instanciar los **productos concretos**, de manera que el **cliente** pueda trabajar con familias completas de objetos relacionados sin conocer sus clases concretas, garantizando así la coherencia entre los productos de una misma familia.

Mientras que el *Factory Method* se centra en crear un solo tipo de producto, el *Abstract Factory* se ocupa de crear **múltiples tipos de objetos** que pertenecen a una misma familia o variante, garantizando que el cliente reciba objetos compatibles entre sí.

>⚠️ No todos los lenguajes permiten el uso de *abstract*, pero en aquellos que sí lo permitan (PHP, Java, ...), se recomienda su uso, al igual que en patrón Factory Method.

<br>

> 💡 **La idea clave:**
> Imagina una fábrica que no solo produce sillas, sino "juegos de muebles". Si pides un juego "Moderno", la fábrica te dará una silla moderna, un sofá moderno y una mesa moderna. No te dará una silla moderna con una mesa victoriana. El patrón asegura esa **coherencia**.
>
> Este patrón no obliga a crear familias completas, así que podrías pedirle a una fábrica que te dé sólo una silla moderna, o una mesa clásica, pero sabes que si le pides varios objetos a una fábrica concreta, todos ellos serán compatibles o de la misma familia (no podrías pedirle a una fábrica moderna que te dé una silla moderna y una mesa victoriana).
>
> Este patrón es especialmente útil cuando necesitas mantener la **coherencia** entre los objetos de una misma familia, lo que es especialmente útil en interfaces gráficas, donde los objetos deben ser compatibles entre sí.

<br>

### 💡 Entendiendo la definición

#### 🧩 Elementos principales

📌 **FÁBRICA ABSTRACTA (Abstract Factory)**: Es una interfaz (o clase abstracta) que declara un conjunto de métodos para crear cada uno de los productos de la familia (por ejemplo: `fabricarSilla()`, `fabricarMesa()`, `fabricarSofa()`, etc...). No implementa nada, solo dice: "*quien quiera ser una fábrica de este tipo de objetos debe tener ciertos métodos*". Al igual que pasa con el patrón Factory Method, la fabrica abstracta puede ser una interfaz o una clase abstracta (dependiendo de las necesidades del proyecto), pero también podría ser una clase concreta.

📌 **MÉTODOS FÁBRICA (Factory Methods)**: Son los métodos declarados en la fábrica abstracta, cada uno responsable de crear un tipo específico de producto de la familia. Por ejemplo: `fabricarSilla()`, `fabricarMesa()`, `fabricarSofa()`. Cada uno de estos métodos es, en esencia, un **Factory Method** que debe ser implementado por las fábricas concretas. El tipo de retorno de cada método fábrica DEBE coincidir con la interfaz del producto abstracto correspondiente (por ejemplo, `fabricarSilla(): SillaInterface`).
Y del mismo modo que sucede en el patrón Factory Method, los métodos fábrica de la fábrica abstracta pueden ser abstractos (no implementados) o concretos (implementados), aunque igualmente, es más coherente que sean abstractos.

📌 **FÁBRICAS CONCRETAS**: Son las implementaciones de la fábrica abstracta. Cada fábrica concreta se especializa en una **variante** o **familia**.

Estas clases son las que se van a instanciar en cada caso (no la fábrica abstracta), y por tanto, son las que van a determinar en cada situación, mediante su implementación de los métodos fábrica, el tipo de objeto que se va a crear en cada situación, pero siempre siendo objetos de la misma variante o familia:

- `FabricaMueblesModernos`: fabrica sillas, sofás, lámparas, etc... Modernos.
- `FabricaMueblesClasicos`: fabrica sillas, sofás, lámparas, etc... Clásicos.

**La responsabilidad de las fábricas concretas ES EXCLUSIVAMENTE crear objetos ProductoConcreto.** A diferencia del patrón Factory Method (donde las subclases heredan lógica de negocio de la clase base), en el patrón Abstract Factory las fábricas concretas son "puras fábricas": solo crean y devuelven objetos. **La lógica de negocio reside en el Cliente**, no en las fábricas.

Estas fábricas concretas se instanciarán, como cualquier otra clase, con el **new** y darán lugar a un objeto de esa fábrica concreta (`FabricaMueblesModernos`, `FabricaMueblesClasicos`, etc...). Cada fábrica concreta implementará todos los métodos fábrica declarados en la interfaz, y cada uno de esos métodos simplemente creará y devolverá el ProductoConcreto correspondiente a su familia.

Por ejemplo, una clase `FabricaMueblesModernos` (que implementa la interface `MueblesFactoryInterface`):

- **Implementará todos los métodos fábrica** declarados en la interfaz (`fabricarSilla()`, `fabricarMesa()`, `fabricarSofa()`, etc.)
- Cada método simplemente creará y devolverá el producto concreto correspondiente a la familia "Moderna":
  - `fabricarSilla()` → devuelve `new SillaModerna()`
  - `fabricarMesa()` → devuelve `new MesaModerna()`
  - `fabricarSofa()` → devuelve `new SofaModerno()`
- **No contiene lógica de negocio adicional**, solo lógica de creación

📌 **PRODUCTOS ABSTRACTOS**: Son interfaces (o clases abstractas) que definen el **contrato** que deben cumplir todos los productos de un mismo tipo, independientemente de la familia a la que pertenezcan.

En el patrón Abstract Factory, necesitamos una interfaz por cada **tipo de producto** que las fábricas puedan crear. Por ejemplo:
- Interfaz `SillaInterface`: Define qué métodos debe tener cualquier silla (moderna, clásica, vintage...)
- Interfaz `MesaInterface`: Define qué métodos debe tener cualquier mesa
- Interfaz `SofaInterface`: Define qué métodos debe tener cualquier sofá

Estas interfaces son las que aparecen como **tipo de retorno de los métodos fábrica**. Por ejemplo, el método `fabricarSilla()` devuelve `SillaInterface`, no una clase concreta.

Esto es fundamental porque permite que el **Cliente** trabaje con abstracciones sin conocer las clases concretas. El cliente sabe que recibirá "algo que cumple el contrato de Silla", pero no necesita saber si es moderna, clásica o vintage.

📌 **PRODUCTOS CONCRETOS**: Son las clases que implementan las interfaces de productos abstractos. Representan las **implementaciones específicas** de cada producto para cada familia o variante.

Cada producto concreto pertenece a una familia específica y debe implementar la interfaz correspondiente a su tipo de producto:

- **Familia Moderna**: `SillaModerna`, `MesaModerna`, `SofaModerno`
- **Familia Clásica**: `SillaClasica`, `MesaClasica`, `SofaClasico`
- **Familia Vintage**: `SillaVintage`, `MesaVintage`, `SofaVintage`

Por ejemplo, `SillaModerna` implementa `SillaInterface`, y `SillaClasica` también implementa `SillaInterface`. Ambas cumplen el mismo contrato, pero cada una lo hace a su manera, con su propio estilo y características.

**Estos son los objetos que realmente se crean** cuando el cliente llama a los métodos fábrica. Cuando el cliente pide `$fabrica->fabricarSilla()`, recibe una instancia de `SillaModerna`, `SillaClasica` o `SillaVintage`, dependiendo de qué fábrica concreta esté usando.


📌 **CLIENTE**: La parte del código que usa la fábrica. El cliente solo conoce las interfaces (Abstract Factory y Abstract Product), por lo que es independiente de las clases concretas que se están usando.

Este cliente NO forma parte del patrón en sí mismo, sino que es el código que se encarga de usar la fábrica para crear los productos.

<br>

### 👨🏼‍🔧 Aplicando la definición a un caso práctico: Tienda de Muebles

Supongamos que tenemos un simulador de una **Tienda de Muebles**. El cliente entra y dice: *"Quiero amueblar mi salón con estilo **Vintage**"*.

La tienda (Cliente) no necesita saber cómo se fabrica cada mueble vintage. Simplemente recibe una `FabricaVintage`. Cuando la tienda necesita una silla, le dice a la fábrica: `fabricarSilla()`. Como la fábrica es la versión "Vintage", devolverá una `SillaVintage`.

Si mañana el cliente quiere estilo **Moderno**, pasamos a la tienda una `FabricaModerna`. La tienda sigue llamando a `fabricarSilla()`, pero ahora mágicamente recibe una `SillaModerna`.

**La tienda no cambia su código**, solo cambia la fábrica que utiliza.

<br>

### 🛂 Elementos obligatorios que debe tener un patrón Abstract Factory

1️⃣ **Interfaz Abstract Factory**: Define los métodos de creación para los distintos productos (`fabricarSilla()`, `fabricarMesa()`, `fabricarLampara()`).
   - En nuestro ejemplo: `Fabrica.php`.
   - **Restricción**: Cada método fábrica debe declarar como tipo de retorno la interfaz del producto abstracto correspondiente (no una clase concreta).

2️⃣ **Fábricas Concretas**: Implementan la interfaz anterior para una familia específica.
   - En nuestro ejemplo: `FabricaClasica.php`, `FabricaModerna.php`, `FabricaVintage.php`.
   - **Restricción**: DEBEN implementar la interfaz Abstract Factory y proporcionar implementaciones concretas para TODOS los métodos fábrica declarados en ella.

3️⃣ **Interfaces de Productos**: Definen qué puede hacer cada producto.
   - En nuestro ejemplo: `Silla.php`, `Mesa.php`, `Lampara.php`.
   - **Restricción**: Deben coincidir con los tipos de retorno declarados en los métodos fábrica de la interfaz Abstract Factory.

4️⃣ **Productos Concretos**: Implementan las interfaces de producto para cada familia.
   - En nuestro ejemplo: `SillaClasica.php`, `MesaModerna.php`, `LamparaVintage.php`, etc.
   - **Restricción**: Cada producto concreto DEBE implementar la interfaz de producto abstracto correspondiente a su tipo (por ejemplo, `SillaClasica` implementa `Silla`).

<br>

### 🎯 ¿Qué objetivos se buscan al aplicar el patrón Abstract Factory?

**📌 Coherencia entre productos**
Garantiza que los productos que usas juntos combinan entre sí (pertenecen a la misma familia). Evita mezclar una Silla Victoriana con una Mesa Futurista por error.

**📌 Desacoplamiento (Principio Open/Closed)**
El código cliente (la tienda) no conoce las clases concretas (`SillaModerna`). Si quieres añadir un nuevo estilo "Futurista", solo creas una nueva fábrica y nuevos productos. No tocas el código de la tienda.

**📌 Principio de Responsabilidad Única**
El código de creación de objetos se concentra en un solo lugar (las fábricas), liberando al resto de la aplicación de esa lógica.

<br>

[🔝](#top)

---

<br>

## 🧪 Ejemplo de implementación: Tienda de Muebles

### 🎡 ¿Qué hace esta aplicación de ejemplo?

Simula varios escenarios de compra en una tienda de muebles. El script principal (`main.php`) utiliza la `TiendaDeMuebles` (el cliente) para procesar diferentes pedidos, demostrando cómo el código puede manejar distintos estilos simplemente cambiando la fábrica:

1.  **Compra de conjunto completo**: Solicita un juego de muebles (silla, mesa y lámpara) de un estilo específico (ej: Clásico).
2.  **Compra de muebles individuales**: Solicita un único mueble de un estilo concreto (ej: una Lámpara Vintage).
3.  **Compra mixta**: Simula un escenario donde el cliente elige diferentes muebles de distintas familias (ej: mesa vintage, sillas clásicas y lámpara moderna), requiriendo el uso de diferentes fábricas secuencialmente.

En todos los casos, la `TiendaDeMuebles` solicita la creación y venta de los muebles sin conocer las clases concretas de los mismos, delegando toda esa lógica en la fábrica que recibe en cada momento.

### 🔄 Flujo completo de esta aplicación de ejemplo

1.  **Selección de la fábrica**: En `main.php` se determina qué estilo de mobiliario se desea procesar (ej. un conjunto clásico):
    ```php
    $fabrica = new FabricaClasica();
    ```

2.  **Inyección en el Cliente**: Se instancia la `TiendaDeMuebles` pasándole la fábrica seleccionada. A partir de aquí, la tienda trabajará solo con interfaces:
    ```php
    $tienda = new TiendaDeMuebles($fabrica);
    ```

3.  **Ejecución de la lógica de negocio**: Se solicita a la tienda realizar una acción (vender un conjunto o un mueble individual):
    ```php
    // El cliente (main.php) llama a un método de la tienda
    echo $tienda->venderConjuntoACliente();
    ```

4.  **Delegación a la fábrica**: Internamente, la `TiendaDeMuebles` utiliza la fábrica para obtener los productos concretos sin saber de qué tipo son:
    ```php
    // Dentro de TiendaDeMuebles.php, se delega a la fábrica
    $silla = $this->fabrica->fabricarSilla();
    ```

5.  **Resultado coherente**: Como la fábrica inyectada era `FabricaClasica`, el método `fabricarSilla()` devolverá automáticamente una instancia de `SillaClasica`. Si hubiéramos inyectado `FabricaModerna`, obtendríamos una `SillaModerna`.

### 👉🏼 Identificación de los principales archivos del ejemplo

Debido a la complejidad del patrón y al número de clases, la estructura de archivos se ha organizado por carpetas (ver sección siguiente).

#### ➡️ Contratos (Interfaces)
Ubicados en `src/Contracts`. Definen las "reglas del juego":
- `Fabrica.php`: El contrato para todas las fábricas.
- `Silla.php`, `Mesa.php`, `Lampara.php`: Contratos para los productos.

#### ➡️ Familias (Estilos)
Ubicados en `src/Styles`. Cada carpeta (`Clasico`, `Moderno`, `Vintage`) contiene:
- Su **Fábrica Concreta** (`FabricaClasica.php`...).
- Sus **Productos Concretos** (`SillaClasica.php`, `MesaClasica.php`...).

#### ➡️ Cliente
Ubicado en `src/Client`.
- `TiendaDeMuebles.php`: Clase que recibe la fábrica y orquesta la creación de los muebles.

<br>

[🔝](#top)

---

<br>

## 📂 Estructura del Proyecto y Composer

A diferencia de ejemplos más simples donde todos los archivos están en la raíz, aquí hemos dado avanzado paso hacia una estructura profesional de PHP moderna.

### 1. Organización del código en `src/`

Para mantener el orden, ya que el patrón Abstract Factory genera muchas clases, hemos movido todo el código fuente a la carpeta `src/`.
Dentro, hemos agrupado las clases por su función o dominio:
- `src/Contracts`: Interfaces.
- `src/Styles`: Implementaciones concretas.
- `src/Client`: Lógica de negocio consumidora.

### 2. Autocarga con Composer (PSR-4)

En lugar de tener una lista interminable de `require "archivo.php"` en nuestro `main.php`, utilizamos **Composer** para la carga automática de clases.

El archivo `composer.json` define el mapeo:
```json
"autoload": {
    "psr-4": {
        "App\\": "src/"
    }
}
```
Esto significa que cualquier clase con el namespace que empiece por `App\` será buscada automáticamente por PHP dentro de la carpeta `src/`. Por ejemplo, la clase `App\Styles\Moderno\SillaModerna` se buscará en `src/Styles/Moderno/SillaModerna.php`.

Gracias a esto, en nuestro `main.php` solo necesitamos una línea para cargar TODO el proyecto:
```php
require "vendor/autoload.php";
```

<br>

[🔝](#top)

---

<br>

## 📋 Requisitos

- **PHP 8.0** o superior.
- **[Composer](https://getcomposer.org/)**: Necesario para generar el mapa de clases (autoload).

<br>

## 🚀 Instalación y Ejecución

### 1. Instalación

1.  Clona este repositorio o descarga los archivos.
2.  Abre una terminal en la carpeta raíz del proyecto.
3.  Ejecuta el siguiente comando para generar la carpeta `vendor` y el autoloader:

    ```bash
    composer dump-autoload
    ```
    > 💡 **Nota**: Como este proyecto no tiene dependencias de librerías externas (solo usamos Composer para el autoload), basta con `composer dump-autoload`. Si hubiera librerías en `require`, usaríamos `composer install`.

### 2. Ejecución

Para ver el patrón en acción, ejecuta el script principal desde la terminal:

```bash
php main.php
```

Verás en la salida cómo la tienda crea muebles de diferentes estilos e incluso familias mixtas (si el código lo permite) o cómo gestiona las diferentes fábricas.

<br>

[🔝](#top)
