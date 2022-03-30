import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http'

@Injectable({
  providedIn: 'root'
})
export class PersonnelService {

  constructor(private httpClient : HttpClient) { }
  getData(){
    return this.httpClient.get('http://127.0.0.1:8000/api/personnels');
  }
  getabs(){
    return this.httpClient.get('http://127.0.0.1:8000/api/personnels/abse');
  }
  getabsence(PERS_MAT_95:number){
    return this.httpClient.get('http://127.0.0.1:8000/api/personnels' + '/' + PERS_MAT_95);
  }
  getconge(id:number){
    return this.httpClient.get('http://127.0.0.1:8000/api/conge' + '/' + id);
  }
}
