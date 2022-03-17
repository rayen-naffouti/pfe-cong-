import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {
  form!: FormGroup;
  user:any;
  constructor(
    private http: HttpClient,
    private router: Router
  ) {
  }

  ngOnInit(): void {
    
    this.http.get('http://localhost:8000/api/user', {withCredentials: true}).subscribe(
    res => {
      this.user = res;
      console.log(this.user)
      },
      
    );
  }
  logout(): void {
    this.http.post('http://localhost:8000/api/logout', {}, {withCredentials: true})
    .subscribe(() => this.router.navigate(['/login']).then(() => {
      window.location.reload();
    }));
    
  }
  
}
