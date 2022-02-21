import {Component, ElementRef, ViewChild, OnInit} from '@angular/core';
import {UserService} from "./user.service";
import {Users} from "./users";
import { LoadingService } from './loading.service';
import { Observable, BehaviorSubject } from 'rxjs';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit  {
  title = 'frontend';

  users: any[] = [];

  constructor(private userService: UserService) {
    
  }

  ngOnInit(): void {
    this.getUsers();
  }

  getUsers(): void {
    this.userService.getUsers().subscribe(users => this.users = users);
  }

  reload(): void {
    this.getUsers();
  }
}
