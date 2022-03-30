import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http'
import { Router } from '@angular/router';
import { LocalStorageService } from "src/app/service/local-storage.service";

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  user:any;
  constructor(
    private httpClient : HttpClient,
    private router: Router,
    private localStorageService: LocalStorageService
    ) { }

  getuser(){
    return this.httpClient.get('http://localhost:8000/api/user', {withCredentials: true});
  }

  logout(): void {
      this.httpClient.post('http://localhost:8000/api/logout', {}, {withCredentials: true})
       .subscribe(() => this.router.navigate(['/login']).then(() => {
         window.location.reload();
         this.localStorageService.clear('access_token');
       }));
      }

  loggedIn(){
    return !!localStorage.getItem('access_token');
  }


}
