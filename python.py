import json

def write_json(data, filename="csvjson.json"):
    with open (filename, "w") as f:
        json.dump(data, f, indent=4)

with open ("csvjson.json") as json_file:
    data = json.load(json_file)       
temp = data["details"]         
write_json(data)