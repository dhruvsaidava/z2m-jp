# Arduino Packages

## Required Downloads

### Library Package

- **[Download Library Package (Arduino)](#)**
  
> Includes all sensor and module libraries used in Z2M.  
> 使用センサー・モジュールのライブラリ一式。

**Contents:**
- Ultrasonic sensor library
- Servo motor library
- LCD display library
- Temperature sensor library
- LED control library
- Button input library

**Installation:**
1. Download the library package ZIP file
2. Open Arduino IDE
3. Go to Sketch → Include Library → Add .ZIP Library
4. Select the downloaded file
5. Restart Arduino IDE

---

### Code Package

- **[Download Code Package (Arduino)](#)**
  
> Sample programs for Z2M workshop activities.  
> ワークショップ用のサンプルコード集。

**Contents:**
- Basic LED blink examples
- Sensor reading programs
- Motor control code
- Display output examples
- Combined system projects

**How to Use:**
1. Extract the ZIP file to your documents folder
2. Open Arduino IDE
3. File → Open → Navigate to extracted folder
4. Select the example you want to try
5. Upload to your Arduino board

---

## Library Reference

### Core Libraries Included

#### Servo Library
```cpp
#include <Servo.h>
// Control servo motors for movement and actuation
```

#### LiquidCrystal Library
```cpp
#include <LiquidCrystal.h>
// Display text and numbers on LCD screens
```

#### NewPing Library
```cpp
#include <NewPing.h>
// Measure distance with ultrasonic sensors
```

#### DHT Sensor Library
```cpp
#include <DHT.h>
// Read temperature and humidity
```

---

## Troubleshooting

### Library Not Found Error
- Ensure libraries are installed correctly
- Restart Arduino IDE after installation
- Check library folder location

### Code Upload Fails
- Verify correct board is selected (Tools → Board)
- Check the correct port is selected (Tools → Port)
- Ensure USB cable is properly connected

### Compilation Errors
- Check for syntax errors in your code
- Verify all required libraries are included
- Ensure library versions are compatible

---

## Additional Resources

- [Arduino Official Documentation](https://www.arduino.cc/reference/en/)
- [Arduino Forum](https://forum.arduino.cc/)
- Z2M-specific troubleshooting guide

