# case "f160":
#                 return whichVoiceAssistant() ? R.raw.f160 : R.raw.f160;

for i in range(1,22):
    x= 55 + i * 5
    string = "case \"" + str(x) + "\": \n\treturn whichVoiceAssistant() ? R.raw.m" + str(x) + " : R.raw.f" + str(x) + ";"
    print string
    # print string1
