import { Injectable } from '@angular/core';
import {ClientOrders} from "./client_orders";
import {HttpClient, HttpHeaders} from "@angular/common/http";
import {catchError, Observable, tap, of} from "rxjs";
import {MessageService} from "./message.service.";



@Injectable({
  providedIn: 'root'
})
export class ClientOrdersService {

  private clientOrdersUrl = 'http://localhost:61746/api/Customers/85/Orders';

  httpOptions = {
    headers: new HttpHeaders({ 'Content-Type': 'application/json' })
  };

  constructor(private http: HttpClient, private messageService: MessageService) { }

  getClientOrders(): Observable<ClientOrders[]> {
    return this.http.get<ClientOrders[]>(this.clientOrdersUrl)
      .pipe(
        tap(_ => console.log('aa')),
        catchError(this.handleError<ClientOrders[]>('getHeroes', []))
      );
  }

  private log(message: string) {
    this.messageService.add(`HeroService: ${message}`);
  }

  private handleError<T>(operation = 'operation', result?: T) {
    return (error: any): Observable<T> => {

      // TODO: send the error to remote logging infrastructure
      console.error(error); // log to console instead

      // TODO: better job of transforming error for user consumption
      this.log(`${operation} failed: ${error.message}`);

      // Let the app keep running by returning an empty result.
      return of(result as T);
    };
  }
}
