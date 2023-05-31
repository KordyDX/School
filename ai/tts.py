import whisper
import record
import os
os.system('cls' if os.name == 'nt' else 'clear')

record.save()

model = whisper.load_model("base")
result = model.transcribe("output.wav")
print(result["text"])