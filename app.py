from fastapi import FastAPI
from detoxify import Detoxify
from pydantic import BaseModel
import json

class Input_Text(BaseModel):
    text:str

app = FastAPI()

@app.get("/")
async def healthcheck():
    return "hello"

@app.post("/predict")
async def getPrediction(input_text:Input_Text):
    try:
        result = Detoxify("original").predict(input_text.text)
        response = {"Toxicity":float(result["toxicity"]),"Non-Toxicity":float(1-result["toxicity"])}
        return {"status":200,"message":json.dumps(response)}
    except Exception as e:
        return {"status":500,"message":e}
    
