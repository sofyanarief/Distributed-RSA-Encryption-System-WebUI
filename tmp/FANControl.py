import RPi.GPIO as GPIO

class FANControl:
    PWM = None
    FAN_PIN = None
    FAN_FREQ = 100
    MIN_TEMP = 30
    MAX_TEMP = 60
    DUTY_CYCLE = 0

    GPIO.setmode(GPIO.BOARD)
    GPIO.setwarnings(False)

    def __init__(self, pin, freq, min_temp, max_temp):
        self.FAN_PIN = pin
        self.FAN_FREQ = freq
        self.MIN_TEMP = min_temp
        self.MAX_TEMP = max_temp

        GPIO.setup(self.FAN_PIN, GPIO.OUT, initial=GPIO.LOW)
        self.PWM = GPIO.PWM(self.FAN_PIN, self.FAN_FREQ)

    def setFANSpeed(self, now_temp):
        self.DUTY_CYCLE = int((now_temp - self.MIN_TEMP) * 100 / (self.MAX_TEMP - self.MIN_TEMP))
        if self.DUTY_CYCLE > 100:
            self.DUTY_CYCLE = 100
        if self.DUTY_CYCLE == 0:
            self.PWM.ChangeDutyCycle(0)
            self.PWM.stop()
            GPIO.output(self.FAN_PIN, GPIO.LOW)
        else:
            self.PWM.start(0)
            self.PWM.ChangeDutyCycle(self.DUTY_CYCLE)
