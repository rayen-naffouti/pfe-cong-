import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http'

@Injectable({
  providedIn: 'root'
})
export class NgsignService {

  constructor(private httpClient : HttpClient) { }
  gettransiction(uuid:string){
    return this.httpClient.get('http://127.0.0.1:8000/api/ngsign' + '/' + uuid);
  }
}
