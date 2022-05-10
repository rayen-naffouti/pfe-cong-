import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http'

@Injectable({
  providedIn: 'root'
})
export class SignataireService {

  constructor(private  httpClient : HttpClient) { }

  addsignataire(list: any): void {
    this.httpClient.post('http://127.0.0.1:8000/api/addsignataire', list)
     .subscribe(() => {
       window.location.reload();
     });
    }

    getsignataire(id:number) {
      return this.httpClient.get('http://127.0.0.1:8000/api/signataire' + '/' + id);
      }
}
