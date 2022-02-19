import {Component, ElementRef, ViewChild} from '@angular/core';
import {ClientOrdersService} from "./client-orders.service";
import {ClientOrders} from "./client_orders";
import {NgbModal} from "@ng-bootstrap/ng-bootstrap";

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})

export class AppComponent {
  title = 'test';

  clientOrders: ClientOrders[] = [];

  constructor(private clientOrdersService: ClientOrdersService,) {}

  ngOnInit(): void {
    this.getClientOrders();
  }

  getClientOrders(): void {
    this.clientOrdersService.getClientOrders()
      .subscribe(heroes => this.clientOrders = heroes);
  }
}
