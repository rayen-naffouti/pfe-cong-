import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class CongeService {

  constructor(private httpClient : HttpClient) { }
  getdemandes(){
    return this.httpClient.get('http://127.0.0.1:8000/api/demande');
  }
  getmydemandes(id:number){
    return this.httpClient.get('http://127.0.0.1:8000/api/demande' + '/' + id);
  }
}
