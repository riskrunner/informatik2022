package aufgaben;

import java.util.Scanner;

public class Afg1 {
	/*
	 e
	 */

	public static void main(String[] args) {

			Scanner sc = new Scanner(System.in);	//Initialisierung der Klasse Scanner
			
			System.out.println("Bitte geben sie den Steuersatz an:");	//Ausgabe der Frage nach Steuersatz
			int mehrwertsteuer = sc.nextInt();							//Abfrage der Eingabe durch Scanner
			
			System.out.println("Bitte geben sie den Nettowert ein:");	//Ausgabe der Frage nach Nettowert
			double netto = sc.nextDouble();								//Abfrage der Eingabe durch Scanner
			
			double brutto = netto * ((double) mehrwertsteuer/100 + 1);	//Berechnung des Bruttowerts
			System.out.println("Der Bruttowert beträgt:");				//Ausgabe der Antort
			System.out.println(brutto + "€");							//Ausgabe des Wertes	
	}

}
