import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';
import { Observable } from 'rxjs/internal/Observable';
import { AuthService } from 'src/app/service/auth.service';
import { CongeService } from '../service/conge.service';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {
  form!: FormGroup;
  user:any;
  userimagepath:any = 'http://127.0.0.1:8000/image/';
  test:any;
  solde:any;
  constructor(
    private http: HttpClient,
    private router: Router,
    private authService: AuthService,
    private congeService: CongeService,
  ) {
  }

  ngOnInit(): void {
    this.getUser();
    if (this.authService.loggedIn()){
      this.test = true;
    }else{
      this.test = false
    }
    this.getmysolde();
    // console.log(this.test)
  }
  
  getUser(){
    this.authService.getuser().subscribe(res => {
      this.user = res;
        // console.log(this.user)
    })
  }

  getmysolde(){
    this.authService.getuser().subscribe(res => {
      this.user = res;
    this.congeService.getmysolde(this.user.id).subscribe(res =>{
      this.solde = res;
      //  console.log(this.solde);
    })
  }) 
  }

  logout(): void {
    this.authService.logout();
  }

  
}
