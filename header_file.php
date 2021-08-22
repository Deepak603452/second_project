<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" name="viewport" content="width-device-width, initial-scale=1, shrink-to-fit=no">
    <title>home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="finalcss.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>

<header>
        <div class="main">
            <div class="logo">
                <img src="logo.png">
                    <?php include("navbar.php");?>


<center><img style="text-align: bottom;" src="Atmel_AVR_(logo).jpg"/></center>
</br><b/><center><marquee><P style="font-family: sans-serif; font-size: 30px; color: red;">AVR microcontroller</marquee></center><BR/>
<HR size="2"/>

<div class="animated animatedFadeInUp fadeInUp"><BR/><BR/>
AVR is a family of microcontrollers developed since 1996 by Atmel, acquired by Microchip Technology in 2016. These are modified Harvard architecture 8-bit RISC single-chip microcontrollers. AVR was one of the first microcontroller families to use on-chip flash memory for program storage, as opposed to one-time programmable ROM, EPROM, or EEPROM used by other microcontrollers at the time.
AVR microcontrollers find many applications as embedded systems. They are especially common in hobbyist and educational embedded applications, popularized by their inclusion in many of the Arduino line of open hardware development boards.</p></div>

</br></br>

<div class="animated animatedFadeInUp fadeInUp"><B/><p style="font-family: sans-serif; font-size: 40px;" class="animated animatedFadeInUp fadeInUp">Features
<HR size="2"/>

</br></br><b><p>AVRs offer a wide range of features:</p></b></br></br>

    <P><B>.</B> Multifunction, bi-directional general-purpose I/O ports with configurable, built-in pull-up resistors.<BR/>
    <B>.</B> Multiple internal oscillators, including RC oscillator without external parts.<BR/>
    <B>.</B> Internal, self-programmable instruction flash memory up to 256 KB (384 KB on XMega).<BR/>
        <B>.</B> In-system programmable using serial/parallel low-voltage proprietary interfaces or JTAG.<BR/>
        <B>.</B> Optional boot code section with independent lock bits for protection.<BR/>
    <B>.</B> On-chip debugging (OCD) support through JTAG or debugWIRE on most devices.<BR/></P>
        <P><B>.</B> The JTAG signals (TMS, TDI, TDO, and TCK) are multiplexed on GPIOs. These pins can be configured to function as JTAG or GPIO depending on the setting of a fuse bit, which can be programmed via ISP or HVSP. By default, AVRs with JTAG come with the JTAG interface enabled.<BR/>
        <B>.</B> debugWIRE uses the /RESET pin as a bi-directional communication channel to access on-chip debug circuitry. It is present on devices with lower pin counts, as it only requires one pin.<BR/>
    <B>.</B> Internal data EEPROM up to 4 KB.<BR/>
    <B>.</B> Internal SRAM up to 16 KB (32 KB on XMega).<BR/>
    <B>.</B> External 64 KB little endian data space on certain models, including the Mega8515 and Mega162.<BR/>
        <B>.</B> The external data space is overlaid with the internal data space, such that the full 64 KB address space does not appear on the external bus and accesses to e.g. address 010016 will access internal RAM, not the external bus.<BR/>
        <B>.</B> In certain members of the XMega series, the external data space has been enhanced to support both SRAM and SDRAM.As well, the data addressing modes have been expanded to allow up to 16 MB of data memory to be directly addressed.</P><BR/>
    <P><B>.</B> 8-bit and 16-bit timers.<BR/>
        <B>.</B> PWM output (some devices have an enhanced PWM peripheral which includes a dead-time generator).<BR/>
        <B>.</B> Input capture that record a time stamp triggered by a signal edge.<BR/>
    <B>.</B> Analog comparator.<BR/>
    <B>.</B> 10 or 12-bit A/D converters, with multiplex of up to 16 channels.<BR/>
    <B>.</B> 12-bit D/A converters.<BR/>
    <B>.</B> A variety of serial interfaces, including.<BR/>
        <B>.</B> I²C compatible Two-Wire Interface (TWI).<BR/>
        <B>.</B> Synchronous/asynchronous serial peripherals (UART/USART) (used with RS-232, RS-485, and more).<BR/>
        <B>.</B> Serial Peripheral Interface Bus (SPI).<BR/>
        <B>.</B> Universal Serial Interface (USI): a multi-purpose hardware communication module that can be used to implement an SPI,[12] I2C[13][14] or UART[15] interface.</P><BR/>
   <P> <B>.</B> Brownout detection.<BR/>
    <B>.</B> Watchdog timer (WDT).<BR/>
    <B>.</B> Multiple power-saving sleep modes.<BR/>
    <B>.</B> Lighting and motor control (PWM-specific) controller models.<BR/>
    <B></B>. CAN controller support.<BR/>
    <B>.</B> USB controller support.<BR/>
    <B>.</B> Ethernet controller support.<BR/>
    <B>.</B> LCD controller support.<BR/>
    <B>. Low-voltage devices operating down to 1.8 V (to 0.7 V for parts with built-in DC–DC upconverter).<BR/>
    <B>.</B> picoPower devices.<BR/>
    <B>.</B> DMA controllers and "event system" peripheral communication.<BR/>
    <B>.</B> Fast cryptography support for AES and DES.</P><BR/>
</P></div>

<div  class="animated animatedFadeInUp fadeInUp"><BR/><P style="font-family: sans-serif; font-size: 40px;"><B>Uses</B>
<HR size="2"/><BR/><BR/>

<left><img class="animated animatedFadeInUp fadeInUp" style="text-align: bottom; padding-right: 25px; padding-top: 30px; height: 150px; width: 150px;" src="220px-Arduino_Duemilanove_0509.JPG"/></left>
<P><BR/><BR/>
    AVRs have been used in various automotive applications such as security, safety, powertrain and entertainment systems. Atmel has recently launched a new publication "Atmel Automotive Compilation" to help developers with automotive applications. Some current usages are in BMW, Daimler-Chrysler and TRW.

The Arduino physical computing platform is based on an ATmega328 microcontroller (ATmega168 or ATmega8 in board versions older than the Diecimila).The ATmega1280 and ATmega2560, with more pinout and memory capabilities, have also been employed to develop the Arduino Mega platform. Arduino boards can be used with its language and IDE, or with more conventional programming environments (C, assembler, etc.) as just standardized and widely available AVR platforms.

USB-based AVRs have been used in the Microsoft Xbox hand controllers. The link between the controllers and Xbox is USB.</P><BR/><BR/>

<right><img style="text-align: bottom; padding: 25px;" src="220px-Atmega8_Development_Board.jpg"/></right>

<P><BR/><BR/>
    Numerous companies produce AVR-based microcontroller boards intended for use by hobbyists, robot builders, experimenters and small system developers including: Cubloc,[42] gnusb,[43] BasicX,[44] Oak Micros,[45] ZX Microcontrollers,[46] and myAVR.[47] There is also a large community of Arduino-compatible boards supporting similar users.

Schneider Electric produces the M3000 Motor and Motion Control Chip, incorporating an Atmel AVR Core and an advanced motion controller for use in a variety of motion applications.<BR/><BR/><BR/><BR/><BR/></P></P></div>

</header>

</body>
</html>